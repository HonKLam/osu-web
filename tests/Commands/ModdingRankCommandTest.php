<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace Tests\Commands;

use App\Libraries\Ruleset;
use App\Models\Beatmap;
use App\Models\BeatmapDiscussion;
use App\Models\BeatmapMirror;
use App\Models\Beatmapset;
use Database\Factories\BeatmapsetFactory;
use Tests\TestCase;

class ModdingRankCommandTest extends TestCase
{
    /**
     * @dataProvider rankDataProvider
     */
    public function testRank(int $qualifiedDaysAgo, int $expected): void
    {
        $this->beatmapset([Ruleset::osu], $qualifiedDaysAgo)->create();

        $this->expectCountChange(fn () => Beatmapset::ranked()->count(), $expected);

        $this->artisan('modding:rank', ['--no-wait' => true]);
    }

    /**
     * @dataProvider rankHybridDataProvider
     */
    public function testRankHybrid(array $beatmapsetRulesets, array $expectedCounts): void
    {
        foreach ($beatmapsetRulesets as $rulesets) {
            $this->beatmapset($rulesets)->create();
        }

        $command = $this->artisan('modding:rank', ['--count-only' => true]);
        foreach (Ruleset::cases() as $ruleset) {
            $command->expectsOutputToContain("{$ruleset->name}: {$expectedCounts[$ruleset->value]}");
        }
    }

    public function testRankOpenIssue(): void
    {
        $this->beatmapset([Ruleset::osu])
            ->has(BeatmapDiscussion::factory()->general()->problem())
            ->create();

        $this->expectCountChange(fn () => Beatmapset::ranked()->count(), 0);

        $this->artisan('modding:rank', ['--no-wait' => true]);
    }

    public function testRankOpenIssueCounts(): void
    {
        $this->beatmapset([Ruleset::osu])
            ->has(BeatmapDiscussion::factory()->general()->problem())
            ->create();

        $command = $this->artisan('modding:rank', ['--count-only' => true]);
        $command->expectsOutputToContain(Ruleset::osu->name.': 0');
    }

    public function testRankQuota(): void
    {
        $this->beatmapset([Ruleset::osu])->count(3)->create();

        $this->expectCountChange(fn () => Beatmapset::qualified()->count(), -2);
        $this->expectCountChange(fn () => Beatmapset::ranked()->count(), 2);

        $this->artisan('modding:rank', ['--no-wait' => true]);
    }

    public function testRankQuotaSeparateRuleset(): void
    {
        foreach (Ruleset::cases() as $ruleset) {
            $this->beatmapset([$ruleset])->create();
        }

        $this->expectCountChange(fn () => Beatmapset::ranked()->count(), count(Ruleset::cases()));

        $this->artisan('modding:rank', ['--no-wait' => true]);
    }


    public function rankDataProvider()
    {
        // 1 day ago isn't used because it might or might not be equal to the cutoff depending on how fast it runs.
        return [
            [0, 0],
            [2, 1],
        ];
    }

    public function rankHybridDataProvider()
    {
        return [
            // hybrid counts as ruleset with lowest enum value
            [[[Ruleset::osu, Ruleset::taiko, Ruleset::catch, Ruleset::mania]], [1, 0, 0, 0]],
            [[[Ruleset::taiko, Ruleset::catch, Ruleset::mania]], [0, 1, 0, 0]],
            [[[Ruleset::catch, Ruleset::mania]], [0, 0, 1, 0]],
            [[[Ruleset::mania]], [0, 0, 0, 1]],

            // not comprehensive
            [[[Ruleset::osu, Ruleset::taiko], [Ruleset::osu]], [2, 0, 0, 0]],
            [[[Ruleset::osu, Ruleset::taiko], [Ruleset::taiko]], [1, 1, 0, 0]],
            [[[Ruleset::mania, Ruleset::taiko], [Ruleset::taiko]], [0, 2, 0, 0]],
            [[[Ruleset::mania, Ruleset::taiko], [Ruleset::mania]], [0, 1, 0, 1]],
            [[[Ruleset::catch, Ruleset::taiko], [Ruleset::mania]], [0, 1, 0, 1]],
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        config()->set('osu.beatmapset.minimum_days_for_rank', 1);
        config()->set('osu.beatmapset.rank_per_day', 2);

        BeatmapMirror::factory()->default()->create();
    }

    /**
     * @param Ruleset[] $rulesets
     */
    protected function beatmapset(array $rulesets, int $qualifiedDaysAgo = 2): BeatmapsetFactory
    {
        $fa = Beatmapset::factory();
        $factory = Beatmapset::factory()
            ->owner()
            ->qualified(now()->subDays($qualifiedDaysAgo))
            ->state(['download_disabled' => true]);

        foreach ($rulesets as $ruleset) {
            $factory = $factory->has(Beatmap::factory()->ruleset($ruleset));
        }

        return $factory;
    }
}

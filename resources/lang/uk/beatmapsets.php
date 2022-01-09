<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'availability' => [
        'disabled' => 'Ця карта тимчасово недоступна для завантаження.',
        'parts-removed' => 'Деякі частини цієї карти були видалені за вимоги автора або правовласників.',
        'more-info' => 'Натисніть тут для отримання більш детальної інформації.',
        'rule_violation' => 'Деякі об’єкти, що містяться на цій карті, були видалені після визнання непридатними для використання в osu!.',
    ],

    'download' => [
        'limit_exceeded' => 'Повільніше, грайте більше.',
    ],

    'featured_artist_badge' => [
        'label' => 'Вибрані артисти ',
    ],

    'index' => [
        'title' => 'Список бiтмап',
        'guest_title' => 'Бітмапи',
    ],

    'panel' => [
        'empty' => ' бітмапи відсутні',

        'download' => [
            'all' => 'завантажити',
            'video' => 'завантажити з вiдео',
            'no_video' => 'завантажити без вiдео',
            'direct' => 'відкрити в osu!direct',
        ],
    ],

    'nominate' => [
        'hybrid_requires_modes' => 'Гібридний набір біт-карт вимагає від вас принаймні одного режиму відтворення, на який висуватимуться.',
        'incorrect_mode' => 'Ви не маєте дозволу номінувати для режиму: :mode',
        'full_bn_required' => 'Ви повинні бути повноправним номінатором, щоб виконати цю кваліфікаційну номінацію.',
        'too_many' => 'Вимога щодо номінації вже виконана.',

        'dialog' => [
            'confirmation' => 'Ви впевнені, що хочете номінувати цю карту?',
            'header' => 'Номінувати карту',
            'hybrid_warning' => 'примітка: Ви можете номінувати лише один раз, тому, будь ласка, переконайтеся, що ви номінуєте всі режими, які плануєте',
            'which_modes' => 'Номінувати для яких режимів?',
        ],
    ],

    'nsfw_badge' => [
        'label' => '18+',
    ],

    'show' => [
        'discussion' => 'Обговорення',

        'details' => [
            'by_artist' => 'за :artist',
            'favourite' => 'Додати в обране',
            'favourite_login' => 'Увійдіть, щоб додати цю карту',
            'logged-out' => 'Ви повинні увійти для завантаження карти!',
            'mapped_by' => 'створена :mapper',
            'unfavourite' => 'Видалити з Обраного',
            'updated_timeago' => 'оновлена :timeago',

            'download' => [
                '_' => 'Завантажити',
                'direct' => '',
                'no-video' => 'без відео',
                'video' => 'з відео',
            ],

            'login_required' => [
                'bottom' => 'щоб завантажити',
                'top' => 'Увійдіть',
            ],
        ],

        'details_date' => [
            'approved' => 'затверджено :timeago',
            'loved' => 'улюблена :timeago',
            'qualified' => 'кваліфікована :timeago',
            'ranked' => 'рейтингова :timeago',
            'submitted' => 'завантажена :timeago',
            'updated' => 'оновлена :timeago',
        ],

        'favourites' => [
            'limit_reached' => 'У вас занадто багато обраних карт! Видаліть деякі з них і спробуйте знову.',
        ],

        'hype' => [
            'action' => 'Хайпніть цю мапу, якщо вам сподобалося в неї грати, щоб допомогти їй отримати статус <strong>Рангової</strong>.',

            'current' => [
                '_' => 'Ця карта зараз :status.',

                'status' => [
                    'pending' => 'на розгляді',
                    'qualified' => 'кваліфікована',
                    'wip' => 'в процесі створення',
                ],
            ],

            'disqualify' => [
                '_' => 'Якщо ви знайшли помилку в цій карті, будь ласка, позбавите її кваліфікації :link.',
            ],

            'report' => [
                '_' => 'Якщо ви знайшли проблему в цій мапі, повідомте про це :link щоб наша команда дізналася.',
                'button' => 'Повідомити про проблему',
                'link' => 'тут',
            ],
        ],

        'info' => [
            'description' => 'Опис',
            'genre' => 'Жанр',
            'language' => 'Мова',
            'no_scores' => 'Дані все ще обробляються...',
            'nsfw' => ' Непристойний вміст',
            'points-of-failure' => 'Шкала провалів',
            'source' => 'Джерело',
            'storyboard' => 'Бітмапа містить сторіборд',
            'success-rate' => 'Шанс успіху',
            'tags' => 'Теги',
            'video' => 'Ця карта містить відео',
        ],

        'nsfw_warning' => [
            'details' => 'Ця бітова карта містить непристойний, образливий або тривожний вміст. Хотіли б ви все-таки переглянути його?',
            'title' => 'Непристойний вміст',

            'buttons' => [
                'disable' => 'Вимкнути попередження',
                'listing' => 'Список бітмап',
                'show' => 'Показати',
            ],
        ],

        'scoreboard' => [
            'achieved' => 'досягнуто :when',
            'country' => 'Рейтинг країни',
            'friend' => 'Рейтинг серед друзів',
            'global' => 'Рейтинг в світі',
            'supporter-link' => 'Натисніть <a href=":link">сюди</a> для перегляду всіх можливостей які ви отримаєте!',
            'supporter-only' => 'Ви повинні мати osu!supporter для доступу до рейтингу по друзям, країні та модам!',
            'title' => 'Табло',

            'headers' => [
                'accuracy' => 'Точність',
                'combo' => 'Максимальне комбо',
                'miss' => 'Промахи',
                'mods' => 'Модифікатори',
                'player' => 'Гравець',
                'pp' => '',
                'rank' => 'Ранг',
                'score_total' => 'Всього очок',
                'score' => 'Очки',
                'time' => 'Час',
            ],

            'no_scores' => [
                'country' => 'Ніхто з вашої країни ще не грав на цій карті!',
                'friend' => 'Ніхто з ваших друзів ще не грав на цій карті!',
                'global' => 'Ніхто ще не грав на цій карті! Може бути ви спробуєте?',
                'loading' => 'Результати завантажуються...',
                'unranked' => 'Нерангова карта.',
            ],
            'score' => [
                'first' => 'Лідирує',
                'own' => 'Ваш рекорд',
            ],
        ],

        'stats' => [
            'cs' => 'Розмір нот',
            'cs-mania' => 'Кількість нот',
            'drain' => 'Втрата HP',
            'accuracy' => 'Точність',
            'ar' => 'Швидкість проходження',
            'stars' => 'Складність',
            'total_length' => 'Тривалість (Не враховуючи перерв :hit_length)',
            'bpm' => 'BPM',
            'count_circles' => 'Кількість нот',
            'count_sliders' => 'Кількість слайдерів',
            'user-rating' => 'Рейтинг користувачів',
            'rating-spread' => 'Шкала рейтингу',
            'nominations' => 'Номінації',
            'playcount' => 'Кількість ігор',
        ],

        'status' => [
            'ranked' => 'Ранкнуті',
            'approved' => 'Схвалені',
            'loved' => 'Улюблені',
            'qualified' => 'Кваліфіковані',
            'wip' => 'В процесі створення',
            'pending' => 'На розгляді',
            'graveyard' => 'Закинуті',
        ],
    ],
];

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('user')->insert(
            array(
                'login' => 'Leushkanova_O_Ju',
                'password' => Hash::make('shmrm3heCu'),
                'first_name' => 'Ольга',
                'second_name' => 'Леушканова',
                'patronymic' => 'Юрьевна',
                'job_id' => json_encode(['jobs' => array(12)]),

            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Lukjanova_O_N',
                'password' => Hash::make('6r320DBLZ6'),
                'first_name' => 'Ольга',
                'second_name' => 'Лукьянова',
                'patronymic' => 'Николаевна',
                'job_id' => json_encode(['jobs' => array(9)]),

            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Kustybaev_D_A',
                'password' => Hash::make('hMfTCcx6wo'),
                'first_name' => 'Дмитрий',
                'second_name' => 'Кустыбаев',
                'patronymic' => 'Артурович',
                'job_id' => json_encode(['jobs' => array(37)]),
                'department_id' => 1,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Sokolova_I_N',
                'password' => Hash::make('wTag03oi2x'),
                'first_name' => 'Ирина',
                'second_name' => 'Соколова',
                'patronymic' => 'Николаевна',
                'job_id' => json_encode(['jobs' => array(34)]),

            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Oplesnin_I_I',
                'password' => Hash::make('NnA4YKjzKk'),
                'first_name' => 'Илья',
                'second_name' => 'Оплеснин',
                'patronymic' => 'Иванович',
                'job_id' => json_encode(['jobs' => array(32)]),
                'department_id' => 4,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Ivanova_E_Ju',
                'password' => Hash::make('noxFhQmBu6'),
                'first_name' => 'Елена',
                'second_name' => 'Иванова',
                'patronymic' => 'Юрьевна',
                'job_id' => json_encode(['jobs' => array(33)]),

            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Rybakov_A_Ja',
                'password' => Hash::make('u6ziwZqfaZ'),
                'first_name' => 'Алексей',
                'second_name' => 'Рыбаков',
                'patronymic' => 'Яковлевич',
                'job_id' => json_encode(['jobs' => array(20)]),
                'department_id' => 14,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Poletaev_N_P',
                'password' => Hash::make('1M9et2MrUd'),
                'first_name' => 'Николай',
                'second_name' => 'Полетаев',
                'patronymic' => 'Петрович',
                'job_id' => json_encode(['jobs' => array(20)]),
                'department_id' => 10,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Madikova_E_D',
                'password' => Hash::make('4mu7WJiMuC'),
                'first_name' => 'Елена',
                'second_name' => 'Мадикова',
                'patronymic' => 'Дмитриевна',
                'job_id' => json_encode(['jobs' => array(20)]),
                'department_id' => 8,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Senchilo_A_V',
                'password' => Hash::make('gxZhNuj0eP'),
                'first_name' => 'Анна',
                'second_name' => 'Сенчило',
                'patronymic' => 'Викторовна',
                'job_id' => json_encode(['jobs' => array(20)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Rahimova_L_M',
                'password' => Hash::make('anEu8XhSUx'),
                'first_name' => 'Лилия',
                'second_name' => 'Рахимова',
                'patronymic' => 'Мухаметовна',
                'job_id' => json_encode(['jobs' => array(20)]),
                'department_id' => 12,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Gofshtejn_O_G',
                'password' => Hash::make('Voghtyffzc'),
                'first_name' => 'Олег',
                'second_name' => 'Гофштейн',
                'patronymic' => 'Георгиевич',
                'job_id' => json_encode(['jobs' => array(36)]),
                'department_id' => 2,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Torshilova_V_V',
                'password' => Hash::make('rHwy99g2Yj'),
                'first_name' => 'Валерия ',
                'second_name' => 'Торшилова',
                'patronymic' => 'Валерьевна',
                'job_id' => json_encode(['jobs' => array(20)]),
                'department_id' => 7,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Tolstov_D_O',
                'password' => Hash::make('d5nAe2eeRx'),
                'first_name' => 'Дмитрий',
                'second_name' => 'Толстов',
                'patronymic' => 'Олегович',
                'header' => 'Sokolova_I_N',
                'job_id' => json_encode(['jobs' => array(38)]),
                'department_id' => 5,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Loginov_A_B',
                'password' => Hash::make('VBBfm8lKZ8'),
                'first_name' => 'Антон',
                'second_name' => 'Логинов',
                'patronymic' => 'Борисович',
                'header' => 'Sokolova_I_N',
                'job_id' => json_encode(['jobs' => array(51)]),
                'department_id' => 5,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Pichugov_V_B',
                'password' => Hash::make('VmZFBfeRBx'),
                'first_name' => 'Виталий',
                'second_name' => 'Пичугов',
                'patronymic' => 'Борисович',
                'header' => 'Sokolova_I_N',
                'job_id' => json_encode(['jobs' => array(51)]),
                'department_id' => 5,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Sjuldin_I_E',
                'password' => Hash::make('80zhCW1O6i'),
                'first_name' => 'Иван',
                'second_name' => 'Сюльдин',
                'patronymic' => 'Евгеньевич',
                'header' => 'Sokolova_I_N',
                'job_id' => json_encode(['jobs' => array(51)]),
                'department_id' => 5,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Tereschenko_A_S',
                'password' => Hash::make('F9LWSDXwvg'),
                'first_name' => 'Артём',
                'second_name' => 'Терещенко',
                'patronymic' => 'Сергеевич',
                'header' => 'Sokolova_I_N',
                'job_id' => json_encode(['jobs' => array(51)]),
                'department_id' => 5,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Chernyshkov_N_S',
                'password' => Hash::make('5CHtwkToJf'),
                'first_name' => 'Никита',
                'second_name' => 'Чернышков',
                'patronymic' => 'Сергеевич',
                'header' => 'Sokolova_I_N',
                'job_id' => json_encode(['jobs' => array(51)]),
                'department_id' => 5,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Fedorova_K_A',
                'password' => Hash::make('CksCM7YRsT'),
                'first_name' => 'Кристина',
                'second_name' => 'Федорова',
                'patronymic' => 'Александровна',
                'header' => 'Sokolova_I_N',
                'job_id' => json_encode(['jobs' => array(38)]),
                'department_id' => 5,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Evstigneeva_S_A',
                'password' => Hash::make('GkNcBPSZt5'),
                'first_name' => 'Светлана',
                'second_name' => 'Евстигнеева',
                'patronymic' => 'Анатольевна',
                'header' => 'Sokolova_I_N',
                'job_id' => json_encode(['jobs' => array(18)]),
                'department_id' => 5,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Mihaelis_N_A',
                'password' => Hash::make('RMYKaVQyE3'),
                'first_name' => 'Наталья',
                'second_name' => 'Михаэлис',
                'patronymic' => 'Александровна',
                'header' => 'Sokolova_I_N',
                'job_id' => json_encode(['jobs' => array(15)]),
                'department_id' => 5,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Zhitnjak_N_V',
                'password' => Hash::make('IWS25GRQel'),
                'first_name' => 'Наталья',
                'second_name' => 'Житняк',
                'patronymic' => 'Владимировна',
                'header' => 'Kustybaev_D_A',
                'job_id' => json_encode(['jobs' => array(27)]),
                'department_id' => 1,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Ispulova_G_K',
                'password' => Hash::make('74gnioCWNZ'),
                'first_name' => 'Гульжихан',
                'second_name' => 'Испулова',
                'patronymic' => 'Кадракановна',
                'header' => 'Kustybaev_D_A',
                'job_id' => json_encode(['jobs' => array(26)]),
                'department_id' => 1,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Stepanova_Ju_N',
                'password' => Hash::make('bC7Nqy4lfF'),
                'first_name' => 'Юлия',
                'second_name' => 'Степанова',
                'patronymic' => 'Николаевна',
                'header' => 'Kustybaev_D_A',
                'job_id' => json_encode(['jobs' => array(20)]),
                'department_id' => 1,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Vasileva_L_I',
                'password' => Hash::make('7ksqnL7dq6'),
                'first_name' => 'Лариса ',
                'second_name' => 'Васильева',
                'patronymic' => 'Игоревна',
                'header' => 'Kustybaev_D_A',
                'job_id' => json_encode(['jobs' => array(20)]),
                'department_id' => 1,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Dorogina_N_V',
                'password' => Hash::make('LFTSuIGe6G'),
                'first_name' => 'Наталья',
                'second_name' => 'Дорогина',
                'patronymic' => 'Владимировна',
                'header' => 'Kustybaev_D_A',
                'job_id' => json_encode(['jobs' => array(20)]),
                'department_id' => 1,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Smirnova_L_A',
                'password' => Hash::make('Iip461zhzf'),
                'first_name' => 'Лариса ',
                'second_name' => 'Смирнова',
                'patronymic' => 'Александровна',
                'header' => 'Kustybaev_D_A',
                'job_id' => json_encode(['jobs' => array(21)]),
                'department_id' => 1,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Urvantseva_V_O',
                'password' => Hash::make('mGAaadCDy8'),
                'first_name' => 'Валерия',
                'second_name' => 'Урванцева',
                'patronymic' => 'Олеговна',
                'header' => 'Kustybaev_D_A',
                'job_id' => json_encode(['jobs' => array(69)]),
                'department_id' => 1,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Rychkova_V_B',
                'password' => Hash::make('LKKn03k32b'),
                'first_name' => 'Вера ',
                'second_name' => 'Рычкова',
                'patronymic' => 'Борисовна',
                'header' => 'Kustybaev_D_A',
                'job_id' => json_encode(['jobs' => array(68)]),
                'department_id' => 1,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Nazarova_S_I',
                'password' => Hash::make('bkITRlQS5j'),
                'first_name' => 'Светлана',
                'second_name' => 'Назарова',
                'patronymic' => 'Ивановна',
                'header' => 'Kustybaev_D_A',
                'job_id' => json_encode(['jobs' => array(69)]),
                'department_id' => 1,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Maksimova_O_S',
                'password' => Hash::make('IgYSPlnoys'),
                'first_name' => 'Оксана',
                'second_name' => 'Максимова',
                'patronymic' => 'Сергеевна',
                'header' => 'Kustybaev_D_A',
                'job_id' => json_encode(['jobs' => array(14)]),
                'department_id' => 1,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Bukina_T_G',
                'password' => Hash::make('P5GY3GOLUU'),
                'first_name' => 'Татьяна',
                'second_name' => 'Букина',
                'patronymic' => 'Григорьевна',
                'header' => 'Kustybaev_D_A',
                'job_id' => json_encode(['jobs' => array(14)]),
                'department_id' => 1,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Shestakova_O_A',
                'password' => Hash::make('YFE8XHugKl'),
                'first_name' => 'Ольга',
                'second_name' => 'Шестакова',
                'patronymic' => 'Анатольевна',
                'header' => 'Kustybaev_D_A',
                'job_id' => json_encode(['jobs' => array(49)]),
                'department_id' => 1,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Toporova_R_M',
                'password' => Hash::make('QxGE3uPecA'),
                'first_name' => 'Раиса',
                'second_name' => 'Топорова',
                'patronymic' => 'Макарировна',
                'header' => 'Kustybaev_D_A',
                'job_id' => json_encode(['jobs' => array(46)]),
                'department_id' => 1,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Bakanova_Ju_V',
                'password' => Hash::make('JA87EjhC7E'),
                'first_name' => 'Юлия',
                'second_name' => 'Баканова',
                'patronymic' => 'Владимировна',
                'header' => 'Gofshtejn_O_G',
                'job_id' => json_encode(['jobs' => array(24)]),
                'department_id' => 2,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Kirpach_E_V',
                'password' => Hash::make('JvZ0S8qHuZ'),
                'first_name' => 'Елена',
                'second_name' => 'Кирпач',
                'patronymic' => 'Викторовна',
                'header' => 'Gofshtejn_O_G',
                'job_id' => json_encode(['jobs' => array(4)]),
                'department_id' => 2,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Govrichkova_D_O',
                'password' => Hash::make('SEcQCxccqQ'),
                'first_name' => 'Дарья',
                'second_name' => 'Говричкова',
                'patronymic' => 'Отчество',
                'header' => 'Gofshtejn_O_G',
                'job_id' => json_encode(['jobs' => array(46)]),
                'department_id' => 2,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Danilova_V_I',
                'password' => Hash::make('JVEY1790Mu'),
                'first_name' => 'Валентина',
                'second_name' => 'Данилова',
                'patronymic' => 'Ивановна',
                'header' => 'Gofshtejn_O_G',
                'job_id' => json_encode(['jobs' => array(49)]),
                'department_id' => 2,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Krivosheeva_A_N',
                'password' => Hash::make('ozNKq9myfJ'),
                'first_name' => 'Александра',
                'second_name' => 'Кривошеева',
                'patronymic' => 'Николаевна',
                'header' => 'Gofshtejn_O_G',
                'job_id' => json_encode(['jobs' => array(83)]),
                'department_id' => 2,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Shubina_Ju_A',
                'password' => Hash::make('qhn6PW4kuX'),
                'first_name' => 'Юлия',
                'second_name' => 'Шубина',
                'patronymic' => 'Александровна',
                'header' => 'Gofshtejn_O_G',
                'job_id' => json_encode(['jobs' => array(41)]),
                'department_id' => 2,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Junusbaeva_R_A',
                'password' => Hash::make('mXK9wrSBO3'),
                'first_name' => 'Рима',
                'second_name' => 'Юнусбаева',
                'patronymic' => 'Амировна',
                'header' => 'Oplesnin_I_I',
                'job_id' => json_encode(['jobs' => array(78)]),
                'department_id' => 4,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Matveev_M_D',
                'password' => Hash::make('o8ZDuz6uEV'),
                'first_name' => 'Матвей',
                'second_name' => 'Матвеев',
                'patronymic' => 'Дмитриевич',
                'header' => 'Oplesnin_I_I',
                'job_id' => json_encode(['jobs' => array(73)]),
                'department_id' => 4,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Egorov_M_V',
                'password' => Hash::make('TQEn56EJlR'),
                'first_name' => 'Матвей',
                'second_name' => 'Егоров',
                'patronymic' => 'Вячеславович',
                'header' => 'Oplesnin_I_I',
                'job_id' => json_encode(['jobs' => array(53)]),
                'department_id' => 4,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Belonogova_O_M',
                'password' => Hash::make('hMPTarXdGl'),
                'first_name' => 'Ольга',
                'second_name' => 'Белоногова',
                'patronymic' => 'Михайловна',
                'header' => 'Oplesnin_I_I',
                'job_id' => json_encode(['jobs' => array(25)]),
                'department_id' => 4,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Marina_N_V',
                'password' => Hash::make('jRPDVio7nJ'),
                'first_name' => 'Надежда',
                'second_name' => 'Марьина',
                'patronymic' => 'Викторовна',
                'header' => 'Oplesnin_I_I',
                'job_id' => json_encode(['jobs' => array(57)]),
                'department_id' => 4,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Zaripova_A_H',
                'password' => Hash::make('oiSe8E9K6P'),
                'first_name' => 'Альмира',
                'second_name' => 'Зарипова',
                'patronymic' => 'Хаккиевна',
                'header' => 'Oplesnin_I_I',
                'job_id' => json_encode(['jobs' => array(57)]),
                'department_id' => 4,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Pohiljuk_E_V',
                'password' => Hash::make('maqXYo63TF'),
                'first_name' => 'Елена',
                'second_name' => 'Похилюк',
                'patronymic' => 'Валентиновна',
                'header' => 'Oplesnin_I_I',
                'job_id' => json_encode(['jobs' => array(72)]),
                'department_id' => 4,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Dosaev_D_B',
                'password' => Hash::make('B51pIbwJq9'),
                'first_name' => 'Денис',
                'second_name' => 'Досаев',
                'patronymic' => 'Булатович',
                'header' => 'Oplesnin_I_I',
                'job_id' => json_encode(['jobs' => array(72)]),
                'department_id' => 4,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Efimenko_S_I',
                'password' => Hash::make('w3x7HEX8aa'),
                'first_name' => 'Станислав',
                'second_name' => 'Ефименко',
                'patronymic' => 'Игоревич',
                'header' => 'Oplesnin_I_I',
                'job_id' => json_encode(['jobs' => array(72)]),
                'department_id' => 4,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Medvedeva_N_V',
                'password' => Hash::make('pKU5XY1pIu'),
                'first_name' => 'Наталья',
                'second_name' => 'Медведева',
                'patronymic' => 'Викторовна',
                'header' => 'Rybakov_A_Ja',
                'job_id' => json_encode(['jobs' => array(46)]),
                'department_id' => 14,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Golovanova_T_V',
                'password' => Hash::make('5tQDP7jvL2'),
                'first_name' => 'Татьяна',
                'second_name' => 'Голованова',
                'patronymic' => 'Викторовна',
                'header' => 'Rybakov_A_Ja',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 14,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Shenkorjuk_E_F',
                'password' => Hash::make('Y9Lac7nPsn'),
                'first_name' => 'Евгения',
                'second_name' => 'Шенкорюк',
                'patronymic' => 'Феликсовна',
                'header' => 'Rybakov_A_Ja',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 14,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Pundikov_A_I',
                'password' => Hash::make('Tzhx3xQNbQ'),
                'first_name' => 'Александр',
                'second_name' => 'Пундиков',
                'patronymic' => 'Иванович',
                'header' => 'Rybakov_A_Ja',
                'job_id' => json_encode(['jobs' => array(66)]),
                'department_id' => 14,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Karpov_O_A',
                'password' => Hash::make('50kunOvDKZ'),
                'first_name' => 'Олег',
                'second_name' => 'Карпов',
                'patronymic' => 'Анатольевич',
                'header' => 'Rybakov_A_Ja',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 14,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Halfetdinova_A_R',
                'password' => Hash::make('mEtZptOgqS'),
                'first_name' => 'Альбина',
                'second_name' => 'Хальфетдинова',
                'patronymic' => 'Ришатовна',
                'header' => 'Rybakov_A_Ja',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 14,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Chernobrovin_V_V',
                'password' => Hash::make('xgOxMZuY9E'),
                'first_name' => 'Валерий',
                'second_name' => 'Чернобровин',
                'patronymic' => 'Валерьевич',
                'header' => 'Rybakov_A_Ja',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 14,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Bykov_I_S',
                'password' => Hash::make('SFGNTTOjw4'),
                'first_name' => 'Игорь',
                'second_name' => 'Быков',
                'patronymic' => 'Сергеевич',
                'header' => 'Rybakov_A_Ja',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 14,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Penzina_K_V',
                'password' => Hash::make('Xxf4jCrwQm'),
                'first_name' => 'Кристина',
                'second_name' => 'Пензина',
                'patronymic' => 'Владиславовна',
                'header' => 'Rybakov_A_Ja',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 14,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Galimzjanov_D_R',
                'password' => Hash::make('FihGHyipWW'),
                'first_name' => 'Даниил',
                'second_name' => 'Галимзянов',
                'patronymic' => 'Радикович',
                'header' => 'Rybakov_A_Ja',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 14,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Merenkova_Ju_G',
                'password' => Hash::make('33QFgD0Q8E'),
                'first_name' => 'Юлия',
                'second_name' => 'Меренкова',
                'patronymic' => 'Геннадьевна',
                'header' => 'Ivanova_E_Ju',
                'job_id' => json_encode(['jobs' => array(49)]),
                'department_id' => 6,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Rasputina_S_P',
                'password' => Hash::make('MHUyQVa6F2'),
                'first_name' => 'Светлана ',
                'second_name' => 'Распутина',
                'patronymic' => 'Петровна',
                'header' => 'Ivanova_E_Ju',
                'job_id' => json_encode(['jobs' => array(49)]),
                'department_id' => 6,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Moskaleva_E_V',
                'password' => Hash::make('4d6OMmkmoQ'),
                'first_name' => 'Евгения',
                'second_name' => 'Москалева',
                'patronymic' => 'Владимировна',
                'header' => 'Ivanova_E_Ju',
                'job_id' => json_encode(['jobs' => array(23)]),
                'department_id' => 6,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Tarasova_A_R',
                'password' => Hash::make('8GudsuorNW'),
                'first_name' => 'Айгуль',
                'second_name' => 'Тарасова',
                'patronymic' => 'Равиловна',
                'header' => 'Poletaev_N_P',
                'job_id' => json_encode(['jobs' => array(16)]),
                'department_id' => 10,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Ponkratova_M_V',
                'password' => Hash::make('fIJ99qoQ2l'),
                'first_name' => 'Марина',
                'second_name' => 'Понкратова',
                'patronymic' => 'Викторовна',
                'header' => 'Poletaev_N_P',
                'job_id' => json_encode(['jobs' => array(24)]),
                'department_id' => 10,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Shtejnkrejts_A_Ju',
                'password' => Hash::make('7xyUBXxW00'),
                'first_name' => 'Андрей',
                'second_name' => 'Штейнкрейц',
                'patronymic' => 'Юльевич',
                'header' => 'Poletaev_N_P',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 10,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Tretjakova_T_V',
                'password' => Hash::make('R7PTD7KXuw'),
                'first_name' => 'Татьяна',
                'second_name' => 'Третьякова',
                'patronymic' => 'Викторовна',
                'header' => 'Poletaev_N_P',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 10,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Sokolovskaja_S_M',
                'password' => Hash::make('XlE2ZLiEJR'),
                'first_name' => 'Светлана',
                'second_name' => 'Соколовская',
                'patronymic' => 'Михайловна',
                'header' => 'Poletaev_N_P',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 10,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Sapozhnikova_D_K',
                'password' => Hash::make('fjjG76Beq3'),
                'first_name' => 'Дарья',
                'second_name' => 'Сапожникова',
                'patronymic' => 'Константиновна',
                'header' => 'Poletaev_N_P',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 10,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Repetatskih_D_N',
                'password' => Hash::make('ULFMA4itt6'),
                'first_name' => 'Дмитрий',
                'second_name' => 'Репетацких',
                'patronymic' => 'Николаевич',
                'header' => 'Poletaev_N_P',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 10,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Lapuhina_M_V',
                'password' => Hash::make('7WOemha1uH'),
                'first_name' => 'Мария',
                'second_name' => 'Лапухина',
                'patronymic' => 'Владимировна',
                'header' => 'Poletaev_N_P',
                'job_id' => json_encode(['jobs' => array(17)]),
                'department_id' => 10,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Kandourova_L_V',
                'password' => Hash::make('2uGkafSamS'),
                'first_name' => 'Людмила ',
                'second_name' => 'Кандоурова',
                'patronymic' => 'Васильевна',
                'header' => 'Poletaev_N_P',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 10,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Ivanchenko_A_E',
                'password' => Hash::make('G9lk1aPjG7'),
                'first_name' => 'Александр',
                'second_name' => 'Иванченко',
                'patronymic' => 'Евгеньевич',
                'header' => 'Poletaev_N_P',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 10,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Zausaev_P_G',
                'password' => Hash::make('H0NGflMjJS'),
                'first_name' => 'Павел',
                'second_name' => 'Заусаев',
                'patronymic' => 'Геннадьевич',
                'header' => 'Poletaev_N_P',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 10,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Dolgushina_A_V',
                'password' => Hash::make('ME3dnP9zz7'),
                'first_name' => 'Алёна',
                'second_name' => 'Долгушина',
                'patronymic' => 'Владимировна',
                'header' => 'Poletaev_N_P',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 10,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Gasanova_E_Z',
                'password' => Hash::make('99oAQMxmcn'),
                'first_name' => 'Элеонора',
                'second_name' => 'Гасанова',
                'patronymic' => 'Зауровна',
                'header' => 'Poletaev_N_P',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 10,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Astapov_E_N',
                'password' => Hash::make('T7nzCSbgLp'),
                'first_name' => 'Евгений',
                'second_name' => 'Астапов',
                'patronymic' => 'Николаевич',
                'header' => 'Poletaev_N_P',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 10,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Buzmakova_O_I',
                'password' => Hash::make('Lh6Vqjj5yu'),
                'first_name' => 'Ольга',
                'second_name' => 'Бузмакова',
                'patronymic' => 'Ивановна',
                'header' => 'Poletaev_N_P',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 10,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Andronova_A_V',
                'password' => Hash::make('YSMme4Qe0o'),
                'first_name' => 'Анна',
                'second_name' => 'Андронова',
                'patronymic' => 'Владимировна',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Anufrieva_E_V',
                'password' => Hash::make('zWBszxlU6S'),
                'first_name' => 'Екатерина',
                'second_name' => 'Ануфриева',
                'patronymic' => 'Владимировна',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Bogdan_E_B',
                'password' => Hash::make('bDF8zVfckp'),
                'first_name' => 'Елена',
                'second_name' => 'Богдан',
                'patronymic' => 'Борисовна',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Votchinnikova_V_V',
                'password' => Hash::make('C8gQgyrVVE'),
                'first_name' => 'Виктория ',
                'second_name' => 'Вотчинникова',
                'patronymic' => 'Владимировна',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Golovina_L_A',
                'password' => Hash::make('fHQSzSkR1m'),
                'first_name' => 'Людмила ',
                'second_name' => 'Головина',
                'patronymic' => 'Анатольевна',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Goncharik_A_N',
                'password' => Hash::make('ggwcwfkxZb'),
                'first_name' => 'Анжелика ',
                'second_name' => 'Гончарик',
                'patronymic' => 'Николаевна',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Danilenko_E_G',
                'password' => Hash::make('DqDt7c5EWz'),
                'first_name' => 'Елена',
                'second_name' => 'Даниленко',
                'patronymic' => 'Геннадьевна',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Drozd_N_V',
                'password' => Hash::make('iieOdyOWaz'),
                'first_name' => 'Надежда',
                'second_name' => 'Дрозд',
                'patronymic' => 'Васильевна',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Eremina_E_I',
                'password' => Hash::make('xyjiWyZfqQ'),
                'first_name' => 'Екатерина',
                'second_name' => 'Еремина',
                'patronymic' => 'Ивановна',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Efremov_P_N',
                'password' => Hash::make('f1X7YllPVG'),
                'first_name' => 'Павел',
                'second_name' => 'Ефремов',
                'patronymic' => 'Николаевич',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Karpycheva_T_A',
                'password' => Hash::make('2ojp4CTwrE'),
                'first_name' => 'Татьяна',
                'second_name' => 'Карпычева',
                'patronymic' => 'Анатольевна',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(65)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Kaschenko_O_O',
                'password' => Hash::make('Ubbd0SEZkx'),
                'first_name' => 'Ольга',
                'second_name' => 'Кащенко',
                'patronymic' => 'Олеговна',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Kodenets_O_I',
                'password' => Hash::make('IEuBuL5OCB'),
                'first_name' => 'Оксана',
                'second_name' => 'Коденец',
                'patronymic' => 'Ивановна',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Latypova_F_Ja',
                'password' => Hash::make('HOX8Pw8DUN'),
                'first_name' => 'Файруза',
                'second_name' => 'Латыпова',
                'patronymic' => 'Ямалетдиновна',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Lysjanaja_N_I',
                'password' => Hash::make('5ysQJC4c2w'),
                'first_name' => 'Наталья',
                'second_name' => 'Лысяная',
                'patronymic' => 'Ивановна',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Melnikov_A_V',
                'password' => Hash::make('Mi36nh6vkY'),
                'first_name' => 'Александр ',
                'second_name' => 'Мельников',
                'patronymic' => 'Владимирович',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Shestakova_E_V',
                'password' => Hash::make('gD4zD6ZDDU'),
                'first_name' => 'Елизавета',
                'second_name' => 'Шестакова',
                'patronymic' => 'Владимировна',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Meder_E_A',
                'password' => Hash::make('hw9SSYXmTL'),
                'first_name' => 'Эдуард ',
                'second_name' => 'Медер',
                'patronymic' => 'Альбертович',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Ljudvikevich_N_A',
                'password' => Hash::make('2GjgQu6CF3'),
                'first_name' => 'Наталья',
                'second_name' => 'Людвикевич',
                'patronymic' => 'Анатольевна',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(46)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Egorova_N_A',
                'password' => Hash::make('MVj0eQ8Co8'),
                'first_name' => 'Наталья',
                'second_name' => 'Егорова',
                'patronymic' => 'Анатольевна',
                'header' => 'Senchilo_A_V',
                'job_id' => json_encode(['jobs' => array(16)]),
                'department_id' => 15,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Glotova _Ju_D',
                'password' => Hash::make('LLIcyT1TFp'),
                'first_name' => 'Юлия ',
                'second_name' => 'Глотова ',
                'patronymic' => 'Дмитриевна',
                'header' => 'Madikova_E_D',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 8,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Ilina  _O_A',
                'password' => Hash::make('ii4sVZ3pqh'),
                'first_name' => 'Оксана',
                'second_name' => 'Ильина  ',
                'patronymic' => 'Александровна',
                'header' => 'Madikova_E_D',
                'job_id' => json_encode(['jobs' => array(16)]),
                'department_id' => 8,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Isaeva  _G_N',
                'password' => Hash::make('tg4y3clbmu'),
                'first_name' => 'Галина',
                'second_name' => 'Исаева  ',
                'patronymic' => 'Николаевна',
                'header' => 'Madikova_E_D',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 8,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Kotelnikova  _L_V',
                'password' => Hash::make('Y1vlpdjOPl'),
                'first_name' => 'Лариса',
                'second_name' => 'Котельникова  ',
                'patronymic' => 'Владимировна',
                'header' => 'Madikova_E_D',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 8,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Maljavkina  _L_N',
                'password' => Hash::make('4F25Clywwe'),
                'first_name' => 'Людмила',
                'second_name' => 'Малявкина  ',
                'patronymic' => 'Николаевна',
                'header' => 'Madikova_E_D',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 8,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Mokina _N_V',
                'password' => Hash::make('Os9aCYIYFl'),
                'first_name' => 'Наталья ',
                'second_name' => 'Мокина ',
                'patronymic' => 'Владимировна',
                'header' => 'Madikova_E_D',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 8,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Pavlova _ _G',
                'password' => Hash::make('IDW7j5on05'),
                'first_name' => ' Анна',
                'second_name' => 'Павлова ',
                'patronymic' => 'Геннадиевна',
                'header' => 'Madikova_E_D',
                'job_id' => json_encode(['jobs' => array(65)]),
                'department_id' => 8,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Putenihina _N_A',
                'password' => Hash::make('bxS2npB2JQ'),
                'first_name' => 'Наталья ',
                'second_name' => 'Путенихина ',
                'patronymic' => 'Александровна',
                'header' => 'Madikova_E_D',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 8,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Strunina  _O_A',
                'password' => Hash::make('4MaE8j29x3'),
                'first_name' => 'Оксана',
                'second_name' => 'Струнина  ',
                'patronymic' => 'Александровна',
                'header' => 'Madikova_E_D',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 8,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Trofimova  _M_V',
                'password' => Hash::make('ZFIrtFRlnb'),
                'first_name' => 'Мария',
                'second_name' => 'Трофимова  ',
                'patronymic' => 'Васильевна',
                'header' => 'Madikova_E_D',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 8,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Ulanova  _M_V',
                'password' => Hash::make('vsdxfIE3EG'),
                'first_name' => 'Марина',
                'second_name' => 'Уланова  ',
                'patronymic' => 'Васильевна',
                'header' => 'Madikova_E_D',
                'job_id' => json_encode(['jobs' => array(60)]),
                'department_id' => 8,
            )
        );
DB::table('user')->insert(
            array(
                'login' => 'Novozhilova_A_A',
                'password' => Hash::make('9y7B7Fv9Jn'),
                'first_name' => 'Александра',
                'second_name' => 'Новожилова',
                'patronymic' => 'Альбертовна',
                'header' => 'Madikova_E_D',
                'job_id' => json_encode(['jobs' => array(46)]),
                'department_id' => 8,
            )
        );

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            //
        });
    }
};

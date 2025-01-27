<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialization;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $specializations = [
            
            [
                'name' => 'Дорожный рабочий',
                'photo_url' => 'https://avatars.mds.yandex.net/i?id=c6412a7f2d984ace473bce545cfaaba70ef0ab43-4251345-images-thumbs&n=13',
            ],
            [
                'name' => 'Машинист смесителя а/б',
                'photo_url' => 'https://avatars.mds.yandex.net/get-altay/1880524/2a0000016c9f25c8cdcf8c61f317692bd25f/XXL_height',
            ],
            [
                'name' => 'Машинист б/с установки',
                'photo_url' => 'https://i.vuzopedia.ru/storage/app/uploads/public/608/316/837/608316837ba38975069506.jpg',
            ],
            [
                'name' => 'Помощник б/с установки',
                'photo_url' => 'https://zhel.city/upload/iblock/282/IMG_7880.JPG',
            ],
            [
                'name' => 'Машинист б/с передвижного',
                'photo_url' => 'https://avatars.dzeninfra.ru/get-zen_doc/271828/pub_65f5ee78d901db5e49c668eb_65f5ee7d477f931a69554fc0/scale_1200',
            ],
            [
                'name' => 'Машинист ц/б смесителя',
                'photo_url' => 'https://74.img.avito.st/1280x960/4538065174.jpg',
            ],
            [
                'name' => 'Водитель погрузчика',
                'photo_url' => 'https://profit-staff.su/wp-content/uploads/2023/12/voditel.jpg',
            ],
            [
                'name' => 'Машинист бульдозера',
                'photo_url' => 'https://rk.karelia.ru/wp-content/uploads/2020/09/nkcg4leq7tc84s48cg4.jpg',
            ],
            [
                'name' => 'Машинист автогрейдера',
                'photo_url' => 'https://avatars.mds.yandex.net/get-ydo/4397410/2a00000185ddf08e8e38deab09101a42663b/diploma',
            ],
            [
                'name' => 'Машинист экскаватора',
                'photo_url' => 'https://sib-univer.ru/wp-content/uploads/2023/09/excavator.jpeg',
            ],
            [
                'name' => 'Машинист укладчика асфальтобетона',
                'photo_url' => 'https://perevozka24.ru/img/ck_upload/dorozhnaya-spectekhnika-d-serii-p6820d-abg.jpg',
            ],
            [
                'name' => 'Машинист перегружателя',
                'photo_url' => 'https://avatars.mds.yandex.net/get-ydo/1523397/2a0000016b6ac0f9489575e9b4b10134afff/diploma',
            ],
            [
                'name' => 'Машинист фрезы',
                'photo_url' => 'https://avatars.mds.yandex.net/get-ydo/4397410/2a0000018a8dd4c5691ae54911e58bfa91d6/diploma',
            ],
            [
                'name' => 'Машинист БУК',
                'photo_url' => 'https://avatars.mds.yandex.net/i?id=2ea541da67e4b6257f66b08f00949fd0_l-5274566-images-thumbs&n=13',
            ],
            [
                'name' => 'Машинист заливщика швов',
                'photo_url' => 'https://i.ytimg.com/vi/hRu67frgNZY/maxresdefault.jpg?sqp=-oaymwEmCIAKENAF8quKqQMa8AEB-AH-CYAC0AWKAgwIABABGGUgXChVMA8=&amp;rs=AOn4CLBA4MfyN8awS2NKTYia6dixxN6F3w',
            ],
            [
                'name' => 'Машинист катка на пневматических шинах',
                'photo_url' => 'https://specavto.ru/upload/iblock/44e/44ea3da26ac31589f44753b3f5d0a5aa.jpg',
            ],
            [
                'name' => 'Машинист катка с гладкими вальцами',
                'photo_url' => 'https://scpk.pro/media/img/courses/каток_С.jpg',
            ],
            [
                'name' => 'Машинист компрессорных установок',
                'photo_url' => 'https://i.vuzopedia.ru/storage/app/uploads/public/630/df7/18c/630df718c21f2719269980.jpg',
            ],
            [
                'name' => 'Машинист копра',
                'photo_url' => 'https://novosibirsk.ipk-ipp.ru/wp-content/uploads/sites/49/2020/04/машиниста-копра.jpg',
            ],
            [
                'name' => 'Тракторист',
                'photo_url' => 'https://i.siteapi.org/5bu5GCBR52IrShrdHwlok9U909M=/0x0:1200x864/s2.siteapi.org/0995d1eb19b84f6/img/48sfjz5iz5ics0cgw8go4wk08cwkog',
            ],
        ];

        foreach ($specializations as $specialization) {
            Specialization::create([
                'name' => $specialization['name'],
                'photo_url' => $specialization['photo_url'],
            ]);
    }
    }
}
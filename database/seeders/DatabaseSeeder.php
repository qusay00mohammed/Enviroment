<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AboutUs;
use App\Models\Achievement;
use App\Models\Goal;
use App\Models\Library;
use App\Models\ListGoal;
use App\Models\News;
use App\Models\Partner;
use App\Models\Principle;
use App\Models\Program;
use App\Models\Publication;
use App\Models\Report;
use App\Models\Slider;
use App\Models\Social;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\Setting::create([
            'key' => "facebook",
            'value_ar' => 'facebook.com',
            'value_en' => 'facebook.com',
            'type' => 'text',
            'group' => 'social'
        ]);
        \App\Models\Setting::create([
            'key' => "twitter",
            'value_ar' => 'twitter.com',
            'value_en' => 'twitter.com',
            'type' => 'text',
            'group' => 'social'
        ]);
        \App\Models\Setting::create([
            'key' => "instagram",
            'value_ar' => 'instagram.com',
            'value_en' => 'instagram.com',
            'type' => 'text',
            'group' => 'social'
        ]);
        \App\Models\Setting::create([
            'key' => "email",
            'value_ar' => 'admin@paeep.ps',
            'value_en' => 'admin@paeep.ps',
            'type' => 'text',
            'group' => 'social'
        ]);
        \App\Models\Setting::create([
            'key' => "youtube",
            'value_ar' => 'youtube.com',
            'value_en' => 'youtube.com',
            'type' => 'text',
            'group' => 'social'
        ]);

        // -----------------------------------------
        \App\Models\Setting::create([
            'key' => "location",
            'value_ar' => 'غزة - فلسطين - الرمال - شارع عمرو بن العاص مقابل مدرسة المامونية خلف معلب فلسطين',
            'value_en' => 'Palestine – Gaza City – Amr Ibn Alaas Street – Behind Palestine Stadium',
            'type' => 'text',
            'group' => 'contact_details'
        ]);

        \App\Models\Setting::create([
            'key' => "phone",
            'value_ar' => '+972-8-2829773',
            'value_en' => '+972-8-2829773',
            'type' => 'text',
            'group' => 'contact_details'
        ]);

        \App\Models\Setting::create([
            'key' => "email_message",
            'value_ar' => 'admin@paeep.ps',
            'value_en' => 'admin@paeep.ps',
            'type' => 'text',
            'group' => 'contact_details'
        ]);

        // ----------------------------------------------
        \App\Models\Setting::create([
            'key' => Str::uuid(),
            'value_ar' => 'ق1',
            'value_en' => 'Q1',
            'type' => 'text',
            'group' => 'organizations'
        ]);

        \App\Models\Setting::create([
            'key' => Str::uuid(),
            'value_ar' => 'ش1',
            'value_en' => 'sh1',
            'type' => 'text',
            'group' => 'organizations'
        ]);

        \App\Models\Setting::create([
            'key' => Str::uuid(),
            'value_ar' => 'غ1',
            'value_en' => 'gh1',
            'type' => 'text',
            'group' => 'organizations'
        ]);

        // \App\Models\User::factory(10)->create();

         \App\Models\User::create([
             'name' => 'qusay',
             'email' => 'qusay@example.com',
             'password' => Hash::make('123123123')
         ]);
//         -----------------------------------------------------------
        $store1 = News::create([
            "title_ar" => "تدريب حول تحديث سياسة الانتهاك والاستغلال الجنسي",
            "title_en" => "Training on updating the sexual abuse and exploitation policy",
            "slug" => Str::slug('Training on updating the sexual abuse and exploitation policy'),
            "short_description_ar" => "نفذت جمعية فلسطين التربوية لحماية البيئة (Be'ati) تدريبًا على تحديث سياسة الاعتداء والاستغلال الجنسيين",
            "short_description_en" => "The Palestine Educational Society for the Protection of the Environment (Be'ati) implemented a training on updating the policy of sexual abuse and exploitation",
            "description_ar" => "نفذت جمعية فلسطين التربوية لحماية البيئة (بيئتي) تدريب حول تحديث سياسة الانتهاك والاستغلال الجنسي وذلك ضمن برنامج بناء القدرات الممول من مؤسسة الدياكونية الألمانية DKH، والذي يهدف إلى بناء قدرات الجمعية وموظفيها، وتطوير الكفاءات والمهارات التي يمكن أن تجعلها أكثر فاعلية واستدامة.




حيث قدم التدريب الاستاذ عبد المنعم الطهراوي  مدير شركة ستارت اب, وحضره طاقم العمل حيث تناول التدريب عدة محاور أهمها : مفهوم العنف المبني على النوع الاجتماعي واليات الاستكشاف لغير المختصين ومهارات التعامل مع حالات العنف لغير المختصين,

اليات التحويل وسبل الحماية . بالاضافة الى مناقشة مفهوم الاستغلال , الانتهاك والتحرش الجنسي, و على من تنطبق السياسة وكيفية حماية المستفيدين وفي الختام تم مناقشة  اليات الشكاوي المجتمعية .



وتسعى جمعية بيئتي إلى تأسيس علاقة تكاملية بين المواطن والموظف والجمعية باعتبارهم شركاء في عملية البناء والتطور.",
            "description_en" => "The Palestine Educational Association for the Protection of the Environment (Be'ati) implemented training on updating the sexual abuse and exploitation policy as part of the capacity building program funded by the German Diakonia Foundation (DKH), which aims to build the capabilities of the association and its employees, and develop competencies and skills that can make it more effective and sustainable.




Where the training was presented by Mr. Abdel Moneim Al-Tahrawi, Director of Startup Company, and was attended by the staff, where the training dealt with several axes, the most important of which are: the concept of gender-based violence, exploration mechanisms for non-specialists, and skills for dealing with cases of violence for non-specialists,

Transfer mechanisms and means of protection. In addition to discussing the concept of exploitation, abuse and sexual harassment, to whom the policy applies and how to protect the beneficiaries, in conclusion, the societal complaints mechanisms were discussed.



My environment seeks to establish an integrated relationship between the citizen, the employee and the association as partners in the process of construction and development.",
            // "facebook_link" => "facebook.com",
            // "twitter_link" => "twitter.com",
            // "instagram_link" => "instagram.com",
            "keywords_en" => "keywords",
            "keywords_ar" => "keywords",
        ]);
        $store1->images()->create([
            "filename" => "16903141851.jpg",
        ]);

        $store2 = News::create([
            "title_ar" => "زيارة مؤسسة Diakoni katastrophenhilf لجمعية بيئتي",
            "title_en" => "Diakoni katastrophenhilf visit to my environment association",
            "slug" => Str::slug('Diakoni katastrophenhilf visit to my environment association'),
            "short_description_ar" => "وفد رفيع المستوى من مؤسسة دياكونيا الألمانية يمثله الدكتور أحمد صافي والبروفيسور بيلج مينيكي",
            "short_description_en" => "A high-ranking delegation from the German Diakonia Foundation, represented by Dr. Ahmed Safi and Professor Bilge Meneke",
            "description_ar" => "قام وفد رفيع المستوى من مؤسسة الدياكونية الألمانية ممثل بالدكتور أحمد صافي والأستاذة بيلجيه مينيكيه والأستاذة آنيا كوتزلوسكى بزيارة جمعية فلسطين التربوية لحماية البيئة (بيئتي) في مقرها في مدينة غزة، وذلك بهدف متابعة المشاريع التي تقوم المؤسستان بتنفيذها لتعزيز الوصول إلى الاحتياجات الأساسية وسبل العيش للأسر المتضررة من النزاع في قطاع غزة.
وقام باستقبال الوفد وتنظيم الزيارات ممثلين عن جمعية بيئتي والتي تقوم بالإشراف على تنفيذ هذه المشاريع.",
            "description_en" => "A high-level delegation from the German Diakonia Foundation, represented by Dr. Ahmed Safi, Professor Bilge Meneke and Professor Anja Kotzlowski, visited the Palestine Educational Society for Environmental Protection (Be'ati) at its headquarters in Gaza City, with the aim of following up on the projects that the two institutions are implementing to enhance access to basic needs and livelihoods for families affected by the conflict in the Gaza Strip.
The delegation was received and the visits organized by representatives of my environment association, which is supervising the implementation of these projects.",

            // "facebook_link" => "facebook.com",
            // "twitter_link" => "twitter.com",
            // "instagram_link" => "instagram.com",
            "keywords_en" => "keywords",
            "keywords_ar" => "keywords",
        ]);
        $store2->images()->create([
            "filename" => "16903141851.jpg",
        ]);
        $store2->images()->create([
            "filename" => "16903143862.jpg",
        ]);

        $store3 = News::create([
            "title_ar" => "تحديث خطة الاستعداد والاستجابة للطوارئ",
            "title_en" => "Updating the emergency preparedness and response plan",
            "slug" => Str::slug('Updating the emergency preparedness and response plan'),
            "short_description_ar" => "نفذت جمعية فلسطين التعليمية لحماية البيئة (Be'ati) تدريبًا على تحديث خطة الاستعداد والاستجابة للطوارئ",
            "short_description_en" => "The Palestine Educational Society for Environmental Protection (Be'ati) implemented a training on updating the emergency preparedness and response plan",
            "description_ar" => "نفذت جمعية فلسطين التربوية لحماية البيئة (بيئتي) تدريب حول تحديث خطة الاستعداد والاستجابة للطوارئ وذلك ضمن برنامج بناء القدرات الممول من مؤسسة الدياكونية الألمانية DKH، والذي يهدف إلى بناء قدرات الجمعية وموظفيها، وتطوير الكفاءات والمهارات التي يمكن أن تجعلها أكثر فاعلية واستدامة.
جاء هذا التدريب لمراجعة وتحديث خطة الاستعداد والاستجابة للطوارئ التي أعدتها الجمعية في العام المنصرم بدعم من مؤسسة الدياكونية الألمانية لضمان استعداد الجمعية للاستجابة للأزمات الإنسانية وتقديم الخدمات والدعم بكفاءة وفعالية ودون إحداث ضرر.",
            "description_en" => "The Palestine Educational Association for the Protection of the Environment (Be'ati) implemented training on updating the emergency preparedness and response plan as part of the capacity building program funded by the German Diakonia Foundation (DKH), which aims to build the capabilities of the association and its employees, and develop competencies and skills that can make it more effective and sustainable.
This training came to review and update the emergency preparedness and response plan prepared by the association last year with the support of the German Diakonia Foundation to ensure the association's readiness to respond to humanitarian crises and to provide services and support efficiently, effectively and without causing harm.",

            // "facebook_link" => "facebook.com",
            // "twitter_link" => "twitter.com",
            // "instagram_link" => "instagram.com",
            "keywords_en" => "keywords",
            "keywords_ar" => "keywords",
        ]);
        $store3->images()->create([
            "filename" => "16903141851.jpg",
        ]);
        $store3->images()->create([
            "filename" => "16903143862.jpg",
        ]);
        $store3->images()->create([
            "filename" => "16903144713.jpg",
        ]);

        $store4 = News::create([
            "title_ar" => "تفعيل سياسة الشكاوي",
            "title_en" => "Activate the complaints policy",
            "slug" => Str::slug('Activate the complaints policy'),
            "short_description_ar" => "یعتبر نظام الشكاوى والمعالجة في جمعية فلسطين التربوية لحماية البيئة (بيئتي) جزءًا من المنھج العام",
            "short_description_en" => "The complaints and treatment system in the Palestine Educational Society for the Protection of the Environment (My Environment) is part of the general curriculum.",
            "description_ar" => "یعتبر نظام الشكاوى والمعالجة في جمعية فلسطين التربوية لحماية البيئة (بيئتي) جزءًا من المنھج العام والشمولي لسياسة الجمعية، إذ يهدف إلى ضمان حق المستفيدين، وتحقيق الشفافیة، وتمكين المساءلة، كما أنه يؤدي إلى تطوير مستوى خدمات الجمعية.
نفذت جمعية بيئتي تدريبًا حول آلية التعامل مع الشكاوى والتغذية الراجعة، وقدم التدريب المهندس محمد البردويل مسؤول قسم المتابعة والتقييم في الجمعية، وجاء التدريب ضمن برنامج بناء القدرات الممول من مؤسسة الدياكونية الألمانية DKH.
تسعى جمعية بيئتي إلى تأسيس علاقة تكاملية بين المواطن والموظف والجمعية باعتبارهم شركاء في عملية البناء والتطور.",
            "description_en" => "The complaints and treatment system in the Palestine Educational Society for the Protection of the Environment (My Environment) is part of the general and holistic approach to the association's policy, as it aims to guarantee the rights of beneficiaries, achieve transparency, and enable accountability, as it leads to the development of the level of the association's services.
My Environment Association implemented a training on the mechanism of dealing with complaints and feedback. The training was provided by Engineer Muhammad Al-Bardawil, responsible for the follow-up and evaluation department in the association. The training came within the capacity building program funded by the German Diakonia Foundation (DKH).
My environment seeks to establish an integrated relationship between the citizen, the employee and the association as partners in the process of construction and development.",

            // "facebook_link" => "facebook.com",
            // "twitter_link" => "twitter.com",
            // "instagram_link" => "instagram.com",
            "keywords_en" => "keywords",
            "keywords_ar" => "keywords",
        ]);
        $store4->images()->create([
            "filename" => "16903141851.jpg",
        ]);
        $store4->images()->create([
            "filename" => "16903143862.jpg",
        ]);
        $store4->images()->create([
            "filename" => "16903144713.jpg",
        ]);
        $store4->images()->create([
            "filename" => "16903146904.jpg",
        ]);

        $store5 = News::create([
            "title_ar" => "توقيع اتفاقية تعاون مشترك مع مؤسسة الدياكوني الألمانية للإغاثة الطارئة (DKH)",
            "title_en" => "Signing a joint cooperation agreement with the German Diakonie Foundation for Emergency Relief (DKH)",
            "slug" => Str::slug('Signing a joint cooperation agreement with the German Diakonie Foundation for Emergency Relief (DKH)'),
            "short_description_ar" => "وقعت جمعية فلسطين التربوية لحماية البيئة ( بيئتي) اتفاقية تعاون مشترك مع مؤسسة الدياكوني الألمانية",
            "short_description_en" => "The Palestine Educational Society for the Protection of the Environment (My Environment) signed a joint cooperation agreement with the German Diakonie Foundation",
            "description_ar" => "وقعت جمعية فلسطين التربوية لحماية البيئة ( بيئتي) اتفاقية تعاون مشترك مع مؤسسة الدياكوني الألمانية للإغاثة الطارئة (DKH) وذلك اليوم الأحد الموافق 5/9/2021 في مكتب مؤسسة بيئتي. وحضر عن جمعية بيئتي د. محمود الددح ،رئيس مجلس الإدارة ، بينما حضر د. أحمد صافي ممثلا عن مؤسسة الدياكوني الألمانية. يذكر أنه سيبدأ تنفيذ فعاليات مشروع ” تعزيز الوصول للاحتياجات الأساسية وسبل العيش للسكان المتضررين من الصراع في قطاع غزة” خلال سبتمبر، ويستهدف الأسر الهشة المستفيدة من برنامج النقد الوطني (الشئون الاجتماعية)، ويستمر لمدة عام ونصف.",
            "description_en" => "Today, Sunday, corresponding to 9/5/2021, the Palestine Educational Association for the Protection of the Environment (My Environment) signed a joint cooperation agreement with the German Diakonie Foundation for Emergency Relief (DKH) in the office of My Environment. And attended by my environment d. Mahmoud Al Dah, Chairman of the Board of Directors, while Dr. Ahmed Safi, representative of the German Diakonie Foundation. It is noteworthy that the implementation of the activities of the project “Promoting Access to Basic Needs and Livelihoods for the Conflict-Affected Population in the Gaza Strip” will start in September, targeting vulnerable families benefiting from the National Monetary Program (Social Affairs), and it will last for a year and a half.",

            // "facebook_link" => "facebook.com",
            // "twitter_link" => "twitter.com",
            // "instagram_link" => "instagram.com",
            "keywords_en" => "keywords",
            "keywords_ar" => "keywords",
        ]);
        $store5->images()->create([
            "filename" => "16903141851.jpg",
        ]);
        $store5->images()->create([
            "filename" => "16903143862.jpg",
        ]);
        $store5->images()->create([
            "filename" => "16903144713.jpg",
        ]);
        $store5->images()->create([
            "filename" => "16903146904.jpg",
        ]);
        $store5->images()->create([
            "filename" => "16903149645.jpg",
        ]);
        $store5->images()->create([
            "filename" => "16903150566.jpg",
        ]);

        $store6 = News::create([
            "title_ar" => "تدريب طاقم الجمعية على إعداد خطط الطوارئ",
            "title_en" => "Training the association's staff to prepare emergency plans",
            "slug" => Str::slug("Training the association's staff to prepare emergency plans"),
            "short_description_ar" => "بدأت جمعية فلسطين التربوية لحماية البيئة (بيئتي) فعاليات التدريب على “إعداد خطط الطوارئ ” الذي",
            "short_description_en" => "The Palestine Educational Society for the Protection of the Environment (Be'ati) has started training activities on “preparing emergency plans”, which",
            "description_ar" => "بدأت جمعية فلسطين التربوية لحماية البيئة (بيئتي) فعاليات التدريب على “إعداد خطط الطوارئ ” الذي يستهدف طاقم الجمعية وتنفذه مؤسسة الدياكوني الألمانية للإغاثة الطارئة (DKH) بإشراف وتدريب د. أحمد صافي ممثل المؤسسة في قطاع غزة. ويُعقد التدريب في قاعة جلوريا على شاطئ بحر غزة ويستمر لمدة خمس أيام تدريبية ويتخلله الأنشطة التفاعلية المتنوعة.",
            "description_en" => "The Palestine Educational Association for the Protection of the Environment (My Environment) has started training activities on “preparing emergency plans”, which targets the association’s staff and is implemented by the German Diakonie Foundation for Emergency Relief (DKH), under the supervision and training of Dr. Ahmed Safi, representative of the Foundation in the Gaza Strip. The training will be held in the Gloria Hall on the shore of the Gaza Strip, and will last for five training days, and will include various interactive activities.",

            // "facebook_link" => "facebook.com",
            // "twitter_link" => "twitter.com",
            // "instagram_link" => "instagram.com",
            "keywords_en" => "keywords",
            "keywords_ar" => "keywords",
        ]);
        $store6->images()->create([
            "filename" => "16903141851.jpg",
        ]);
        $store6->images()->create([
            "filename" => "16903143862.jpg",
        ]);
        $store6->images()->create([
            "filename" => "16903144713.jpg",
        ]);
        $store6->images()->create([
            "filename" => "16903146904.jpg",
        ]);
        $store6->images()->create([
            "filename" => "16903149645.jpg",
        ]);
        $store6->images()->create([
            "filename" => "16903150566.jpg",
        ]);
//-------------------------------------------------------------------------------------

        AboutUS::create([
            "title_ar" => "من نحن",
            "title_en" => "About Us",
            "description_ar" => "من نحن",
            "description_en" => "About Us",
            "image" => "16903167721.png",
        ]);

        AboutUS::create([
            "title_ar" => "نبذة عن الجمعية",
            "title_en" => "About PAEEP",
            "description_ar" => "جمعية فلسطين التربوية لحماية البيئة- بيئتي- هي جمعية فلسطينية أهلية تأسست عام 1999م كجمعية غير ربحية غير حكومية مسجلة لدى وزارة الداخلية الفلسطينية برقم تسجيل 7191 .تعمل الجمعية على تعزيز مفاهيم حماية البيئة من خلال نشر الوعي البيئي والمشاركة في القضايا البيئية التي تتلاءم أنشطتها مع حاجة المجتمع المحلي، كما وتعمل الجمعية مع فئات المجتمع المختلفة كالمراهقين والشباب والنساء وغيرها من المجموعات المجتمعية الهشة والمهمشة في مشاريع تهدف الى رفع معاناة الفئات الأكثر حاجة في المجتمع الفلسطيني والى تحسين أوضاعهم الاقتصادية والاجتماعية بدعم من الجهات المحلية والدولية المعنية.

قامت الجمعية منذ عام 2002 وحتى اللحظة بتنفيذ العديد من المشاريع الهادفة الى خدمة المواطنين في غزة والضفة الغربية، حيث قامت الجمعية بتنفيذ (10) مشاريع بيئية ضمن برنامج الصحة والبيئة الذي يهدف لحماية البيئة من خلال تحسين الموارد البيئية والمحافظة عليها إضافة الى التخفيف من المخاطر الناجمة عن التلوث البيئي. كما ويهدف البرنامج الى تحسين وتعزيز وتطوير المعايير البيئية وتشجيع مفاهيم النظافة العامة عن طريق استخدام تقنيات وسلوكيات صديقة للبيئة. وفيما يتعلق بالتدخلات العاجلة في أوقات الازمات والحروب فقد نفذت الجمعية (50) مشروع ضمن برنامج الإغاثة والطوارئ والذي يهدف الى التدخل العاجل ومساعدة المحتاجين في حالات الطوارئ القصوى الناتجة عن الحروب والأزمات أو نتيجة الكوارث الطبيعية المختلفة، بهدف التخفيف من معاناة المنكوبين من خلال تقديم العون الإنساني اللازم لهم وتزويدهم بالحاجات الضرورية من مساعدات مالية وعينية. وفيما يخص التمكين الاقتصادي للأسر الفقيرة والمهمشة قامت الجمعية بتنفيذ (12) مشروع ضمن برنامج التمكين الاقتصادي الذي يهدف بشكل أساسي إلى تمكين العائلات الفلسطينية التي تعاني من الفقر والحرمان والهشاشة ومساعدتها على الخروج من حالة الاعتماد الاقتصادي على المساعدات لتصل إلى حالة الاستقلال الاقتصادي المستدام، وذلك من خلال توفير الخدمات المالية وغير المالية، بالإضافة إلى العمل على تعزيز دور المؤسسة في مجال مكافحة الفقر للوصول والمساهمة الفّعالة بتقليل نسبة الفقر على المستوى الوطني.  وفي السنوات الأخيرة قامت الجمعية بتطوير برنامج بناء القدرات والذي تضمن العديد من التدخلات مثل تطوير الأنظمة وإجراءات العمل والتدريب على تطبيقها كما وشمل البرنامج على بناء قدرات المؤسسة والمؤسسات الشريكة والتشبيك من اجل تبادل الخبرات، إضافة الى تشجيع وترسيخ مفهوم العمل التعاوني والجماعي لدى افراد المجتمع.

اعتمدت الجمعية في تنفيذ مشاريعها على الدعم المالي والتقني المقدم من العديد من الممولين والشركاء مثل   مؤسسة الدياكوني الالمانية للاعاثة الطارئة والمساعدات الشعبية النرويجية، الوكالة الأمربكية للتنمية ، النداء الفلسطيني الموحد،  خدمات الاغاثة الكاثولوكية، الصندوق العربي للانماء الاقتصادي و الاجتماعي ، المؤسسة الدولية لرعاية كبار السن، صندوق الاوبك ،القنصلية الفرنسية في القدس ____الخ.",
            "description_en" => "PAEEP is a Palestinian civil organization established in 1999 as a nonprofit, non-governmental association registered in the Palestinian Ministry of Interior with registration number 7191. PAEEP works to enhance the resilience of marginalized groups and enable them to participate in the development process and make decisions of an environmental and health nature.

PAEEP is officially registered with the Palestinian Authority in Ramallah (since 1999) and meets all due diligence requirements.

It has been a trusted partner by many large donors in the UK, Germany, France, Kuwait, Norway, and other countries.",
            "image" => "16903170621.png",
        ]);

        AboutUS::create([
            "title_ar" => "الرؤية",
            "title_en" => "Vison",
            "description_ar" => "نعمل معكم نحو مجتمع فلسطيني صامد يعيش فيه الفرد في بيئة صحية خضراء و ينعم بحياة اقتصادية واجتماعية امنة.",
            "description_en" => "A clean, healthy and well protected environment supporting a sustainable society and economy.

We work towards strengthening the resiliencies of Palestinian society in which each individual lives in a healthy green environment, and enjoys a secure economic and social life.",
            "image" => "16903172182.jpg",
        ]);

        AboutUS::create([
            "title_ar" => "الرسالة",
            "title_en" => "The Message",
            "description_en" => "To protect and improve the environment as a valuable asset for the people of Gaza. To protect our people and the environment from harmful effects of radiation and pollution. The mission of PAEEP association is to serve, relief, and develop the poor and fragile groups in Palestinian society, and enhance the living, cultural, and social situation for those groups, as well providing them with best management skills to reach and achieve the healthy environment which suit the coming generations. To achieve this mission, PAEEP strives to develop all its financial and human capabilities and resources to provide all required services through the continues developmental projects and programs.",
            "description_ar" => "تتمثل مهمة جمعية فلسطين بيئتي في خدمة وتنمية الفئات الفقيرة في المجتمع الفلسطيني وتحسين الوضع البيئي والثقافي والمعيشي والاجتماعي لهذه الفئات المهمشة والمحرومة وإكسابهم الإدارة السليمة من أجل الوصول لبيئة صحية جيدة تكون مناسبة للأجيال القادمة . ولتحقيق هذه المهمة تسعى الجمعية لتوفير كل طاقاتها وإمكانياتها المادية والبشرية لتوفير جميع الخدمات المطلوبة من خلال المشاريع والبرامج التنموية والتطويرية ذات الطابع الاستمراري.",
            "image" => "16903172333.jpg",
        ]);

// -------------------------------------------------------------------------------------

        Principle::create([
            "title_ar" => "احترام الطبيعة والبيئة",
            "title_en" => "Respect for nature and the environment",
            "description_ar" => "تؤمن الجمعية بضرورة الحفاظ على البيئة والموارد الطبيعية حيث تقوم الجمعية بتطبيق أخلاقيات ادارية وشرائية جديدة لحفظ البيئة والتوعية بالقرارات الدولية ذات العلاقة خلال تنفيذ أنشطتها وطلب المشتريات التي لا تضر بالبيئة بالإضافة الى استخدام البحث العلمي والأكاديمي لتطوير استخدامات وحلول بيئية تتعلق بالطاقة المستدامة كجزء أساسي من اسهامات المؤسسة في تحقيق التنمية المستدامة.",
            "description_en" => "The association believes in the necessity of preserving the environment and natural resources, as the association applies new administrative and procurement ethics to preserve the environment and raise awareness of relevant international decisions during the implementation of its activities and request purchases that do not harm the environment in addition to using scientific and academic research to develop environmental uses and solutions related to sustainable energy as an essential part of the institution's contributions to achieving sustainable development.",
        ]);
        Principle::create([
            "title_ar" => "ضمان حماية الكرامة وعدم التسبب بالأذى",
            "title_en" => "Ensuring the protection of dignity and not causing harm",
            "description_ar" => "تؤمن جمعية بيئتي بأن على المستفيدين المستهدفين في المشاريع الحصول على المساعدات المختلفة الخاصة بهم بالشكل الذي يحمي ويحفظ كرامتهم ويضمن عدم تعرضهم للأذى، وذلك خلال فترات تنفيذ الأنشطة للمشاريع المختلفة .",
            "description_en" => "My Environment Association believes that the targeted beneficiaries of the projects should obtain their various assistance in a way that protects and preserves their dignity and ensures that they are not subjected to harm, during the periods of implementation of the activities of the various projects.",
        ]);
        Principle::create([
            "title_ar" => "المشاركة المجتمعية والتقوية",
            "title_en" => "Community participation and empowerment",
            "description_ar" => "تؤمن جمعية بيئتي بأهمية مشاركة فئات المستهدفين في مختلف الأنشطة ، ومختلف مراحل المشاريع. كذلك ، تقوم الجمعية بتحويل الحالات التي بحاجة للحماية إلى الجهات المعنية.",
            "description_en" => "My Environment Association believes in the importance of the participation of target groups in various activities and various stages of projects. Also, the association transfers cases that need protection to the concerned authorities.",
        ]);
        Principle::create([
            "title_ar" => "التعاون والتكافل والشراكة",
            "title_en" => "Cooperation, interdependence and partnership",
            "description_ar" => "تؤمن الجمعية بان العمل الخيري قائم على أساس التعاون والتنسيق بين كافة الأطراف سواء كانت على المستوى الرسمي الحكومي أو على مستوى مؤسسات المجتمع المدني والجهات المانحة وهو أفضل الطرق والوسائل المتاحة للتواصل مع الفئات المستهدفة في المجتمع الفلسطيني.",
            "description_en" => "The association believes that charitable work is based on cooperation and coordination between all parties, whether at the official governmental level or at the level of civil society institutions and donors, and it is the best way and means available to communicate with the target groups in Palestinian society.",
        ]);
        Principle::create([
            "title_ar" => "النزاهة والشفافية والمصداقية",
            "title_en" => "Integrity, transparency and credibility",
            "description_ar" => "نحن نؤمن بأهمية تحقيق النزاهة والشفافية والمساءلة في جميع الأنشطة والمشاريع المنفذة كما نؤمن بأن عملنا يجب أن يتم بنزاهة وصدق وكفاءة مهنية عالية.",
            "description_en" => "We believe in the importance of achieving integrity, transparency and accountability in all implemented activities and projects. We also believe that our work must be done with integrity, honesty and high professionalism.",
        ]);
        Principle::create([
            "title_ar" => "حقوق الانسان والكرامة الإنسانية",
            "title_en" => "Human rights and human dignity",
            "description_ar" => "تؤمن الجمعية بأنه يقع على عاتقها الى جانب المسئولية الفردية الملقاة على عاتقها تجاه تحقيق رؤيتها ورسالتها بما فيه المصلحة العامة. فان هناك مسئولية جماعية تجاه المجتمع تتعلق باحترام ودعم ونشر مبادئ الكرامة الانسانية وحقوق الانسان وضمان أخذها بعين الاعتبار خلال جميع مراحل تنفيذ فعاليات المؤسسة لترسيخ هذه الثقافة لدى المواطنين.",
            "description_en" => "The association believes that it is its responsibility, along with the individual responsibility entrusted to it, towards achieving its vision and mission, including the public interest. There is a collective responsibility towards society related to respecting, supporting and disseminating the principles of human dignity and human rights and ensuring that they are taken into account during all stages of implementing the activities of the Foundation to consolidate this culture among citizens.",
        ]);
        Principle::create([
            "title_ar" => "الوصول الفعال",
            "title_en" => "effective access",
            "description_ar" => "تؤمن جمعية بيئتي أنه من حق المستفيدين المستهدفين في المشروع الحصول على المساعدات الخاصة بهم في التوقيت المناسب والمكان المناسب من أجل ضمان تحقق الغاية ممكنة من الخدمة",
            "description_en" => "My Environment Association believes that it is the right of the targeted beneficiaries of the project to obtain their aid at the appropriate time and place in order to ensure that the possible goal of the service is achieved.",
        ]);
        Principle::create([
            "title_ar" => "حماية أمن المعلومات",
            "title_en" => "Information security protection",
            "description_ar" => "تؤمن جمعية بيئتي بأهمية حماية بيانات المستفيدين من خلال ضمان معرفة الناس هدف جمع البيانات، الاستخدام المختلف للبيانات المجموعة، مع الاهتمام بحصول الجمعية على موافقة المستفيد عند كل عملية جمع للبيانات خاصة في حالات الحاجة لنشر المعلومات مع جهات معينة ذات علاقة . كما أنه في بعض أنواع المشاريع، تقوم الجمعية بعدم نشر أسماء المستفيدين، كما أنها تشارك معلوماتهم من خلال ملفات محمية.",
            "description_en" => "My Environment Association believes in the importance of protecting the beneficiaries' data by ensuring that people know the purpose of data collection, the different use of the collected data, taking care of the association obtaining the consent of the beneficiary at each data collection process, especially in cases of need to publish information with certain relevant parties. Also, in some types of projects, the association does not publish the names of the beneficiaries, and it shares their information through protected files.",
        ]);
        Principle::create([
            "title_ar" => "العدالة والمساواة",
            "title_en" => "Justice and equality",
            "description_ar" => "نحن نؤمن بمجتمع تسوده المساواة والعدالة، يعيش افراده بسلام وكرامة ويتاح لهم الوصول إلى جميع الموارد المتاحة واللازمة لتحقيق التنمية المستدامة. كما ونؤمن بأن الإنصاف في النوع الاجتماعي يعني العدالة في المعاملة بين الذكر والأنثى وهذا يعني العدالة في تلقي الخدمات كلاً حسب احتياجاته الخاصة.",
            "description_en" => "We believe in a society where equality and justice prevail, in which its members live in peace and dignity and have access to all available resources necessary to achieve sustainable development. We also believe that equity in gender means justice in treatment between males and females, and this means justice in receiving services, each according to his own needs.",
        ]);
// -------------------------------------------------------------------------------------

        Goal::create([
            "title_ar" => "الهدف الرئيسي:",
            "title_en" => "The main objective:"
        ]);
        Goal::create([
            "title_ar" => "ضمان حماية الكرامة وعدم التسبب بالأذى	",
            "title_en" => "Ensuring the protection of dignity and not causing harm"
        ]);
        Goal::create([
            "title_ar" => "الأهداف الخاصة	",
            "title_en" => "own goals"
        ]);
// -------------------------------------------------------------------------------------

        ListGoal::create([
            "description_goal_ar" => "تعزيز صمود الفئات المهمشة وتمكينها من المشاركة في العملية التنموية واتخاذ القرارات ذات الطابع البيئي والصحي",
            "description_goal_en" => "Enhancing the steadfastness of marginalized groups and enabling them to participate in the development process and take decisions of an environmental and health nature",
            "goal_id" => 1,
        ]);
        ListGoal::create([
            "description_goal_ar" => "تحسين الوصول للموارد الصديقة للبيئة من اجل المحافظة على بيئة صحية وامنة",
            "description_goal_en" => "Improving access to environmentally friendly resources in order to maintain a healthy and safe environment",
            "goal_id" => 2,
        ]);
        ListGoal::create([
            "description_goal_ar" => "تعزيز صمود الشعب الفلسطيني في حالات الطوارئ والكوارث الطبيعية والإنسانية",
            "description_goal_en" => "Enhancing the steadfastness of the Palestinian people in emergency situations and natural and humanitarian disasters",
            "goal_id" => 2,
        ]);
        ListGoal::create([
            "description_goal_ar" => "تمكين الاسر الفلسطينية الأكثر احتياجا والوصول بهم لحالة الاستقلال الاقتصادي المستدام",
            "description_goal_en" => "Empowering the most needy Palestinian families and bringing them to a state of sustainable economic independence",
            "goal_id" => 2,
        ]);
        ListGoal::create([
            "description_goal_ar" => "بناء قدرات الجمعية وطاقمها وشركائها",
            "description_goal_en" => "Building the capacity of the association, its staff and partners",
            "goal_id" => 2,
        ]);
        ListGoal::create([
            "description_goal_ar" => "دعم اّليات الحصول على بيئة صحية واّمنة في المؤسسات التعليمية و المراكز الصحية",
            "description_goal_en" => "Supporting mechanisms for obtaining a healthy and safe environment in educational institutions and health centers",
            "goal_id" => 3,
        ]);
        ListGoal::create([
            "description_goal_ar" => "دعم اليات الحصول على فرص عمل لمعيلي الاسر الفقيرة في جميع أنحاء القطاع",
            "description_goal_en" => "Support mechanisms to obtain job opportunities for the breadwinners of poor families throughout the sector",
            "goal_id" => 3,
        ]);
        ListGoal::create([
            "description_goal_ar" => "الحفاظ على البيئة من خلال نشر الوعي البيئي بين أفراد المجتمع",
            "description_goal_en" => "Preserving the environment by spreading environmental awareness among members of society",
            "goal_id" => 3,
        ]);
        ListGoal::create([
            "description_goal_ar" => "توفير الأمن الغذائي وتحسين سبل عيش المزراعين والمتضررين",
            "description_goal_en" => "Providing food security and improving the livelihoods of farmers and affected people",
            "goal_id" => 3,
        ]);
        ListGoal::create([
            "description_goal_ar" => "دعم وتحسين الظروف المعيشية للمتضررين من الحرب والأزمات",
            "description_goal_en" => "Support and improve the living conditions of those affected by war and crises",
            "goal_id" => 3,
        ]);
// -------------------------------------------------------------------------------------

        Slider::create([
            "title_ar" => "نحو بيئة فلسطينية صحية",
            "title_en" => "Towards a healthy Palestinian environment",
            "description_ar" => "نحو بيئة فلسطينية صحية",
            "description_en" => "Towards a healthy Palestinian environment",
            "image" => '16903152921.jpg',
        ]);
        Slider::create([
            "title_ar" => "الأرض مكان جميل وتستحق القتال من أجلها",
            "title_en" => "Earth is a beautiful place and worth fighting for",
            "description_ar" => "تطور الحياة لا يعني إهمال البيئة من حولك",
            "description_en" => "The evolution of life does not mean neglecting the environment around you",
            "image" => '16903153392.jpg',
        ]);
        Slider::create([
            "title_ar" => "من أجل أبنائنا والأجيال القادمة",
            "title_en" => "For our children and future generations",
            "description_ar" => "قد يكون الاختبار النهائي لضمير الإنسان هو استعداده للتضحية بشيء اليوم
من أجل الأجيال القادمة التي لن تسمع كلمات شكرها",
            "description_en" => "The ultimate test of man's conscience may be his willingness to sacrifice something today
For the sake of future generations who will never hear her words of thanks",
            "image" => '16903153923.jpg',
        ]);
        Slider::create([
            "title_ar" => "لنحافظ على هويتنا",
            "title_en" => "To preserve our identity",
            "description_ar" => "الحفاظ على أرضنا حفاظ على هويتنا وقيمنا",
            "description_en" => "Preserving our land, preserving our identity and values",
            "image" => '16903154224.jpg',
        ]);
// -------------------------------------------------------------------------------------

        Program::create([
            "title_ar" => "برنامج الإغاثة والطوارئ",
            "title_en" => "Emergency Response",
            "description_ar" => "يهدف البرنامج الى الإستجابة الطارئة لإغاثة و مساعدة المحتاجين في المواسم و حالات الطوارئ القصوى ، بالإضافة الى تقديم المعونات الإنسانية خلال المواسم الخيرية .",
            "description_en" => "The third strategic objective: To enhance the resilience of the Palestinian people in emergency, natural, and humanitarian disasters.",
            "image" => "16903156401.png",
        ]);
        Program::create([
            "title_ar" => "برنامج بناء وتنمية القدرات",
            "title_en" => "Capacity Building",
            "description_ar" => "يعمل البرنامج على بناء قدرات جمعية بيئتي إداريا وماليا و تحسين شبكة علاقات المؤسسة على المستويين الإقليمي والدولي وذلك تعزيزا لاستراتيجية.",
            "description_en" => "The fourth strategic Objective: Building the capacity of the association, its staff and partners.",
            "image" => "16903156742.png",
        ]);
        Program::create([
            "title_ar" => "برنامج التمكين الاقتصادي",
            "title_en" => "Economic Empowerment",
            "description_ar" => "تمكين الأسر الفلسطينية الفقيرة التي تعاني من فقر وأوضاع معيشية صعبة، تقديم تدخلات في التأهيل والتدريب والتعليم وتوفير حزمة من الخدمات المالية وغير المالية.",
            "description_en" => "The second strategic objective: empower the neediest Palestinian families and link them with a state of sustainable economic independence",
            "image" => "16903157063.png",
        ]);
        Program::create([
            "title_ar" => "برنامج حماية البيئة",
            "title_en" => "Environmental Protection",
            "description_ar" => "يعمل البرنامج على زيادة الوعي البيئي عن طريق تنفيذ العديد من المشاريع البيئية كما يعمل على المساهمة في تنمية وتطوير البيئة الطبيعية وتنفيذ مشاريع صديقة للبيئة .",
            "description_en" => "The first strategic objective: To improve accessibility to friendly environment resources in order to reach to a healthy and safe environment.",
            "image" => "16903157364.png",
        ]);
// -------------------------------------------------------------------------------------

        Partner::create([
            "link" => "https://www.dignite-international.org/",
            "image" => "16903159331.jpg",
        ]);

        Partner::create([
            "link" => "https://no1credit.com/genkinka/tameninaru/jibunde/",
            "image" => "16903159632.png",
        ]);

        Partner::create([
            "link" => "https://www.crs.org/",
            "image" => "16903159913.png",
        ]);

        Partner::create([
            "link" => "https://www.overseas-onlus.org/palestina/",
            "image" => "16903160264.jpg",
        ]);

        Partner::create([
            "link" => "https://www.arabfund.org/",
            "image" => "16903160584.png",
        ]);

        Partner::create([
            "link" => "https://www.usaid.gov/",
            "image" => "16903161076.jpg",
        ]);
// -------------------------------------------------------------------------------------

        Achievement::create([
            "title_ar" => "شراكة",
            "title_en" => "partnerships",
            "number" => "6501",
            "image" => "16903161921.png",
        ]);
        Achievement::create([
            "title_ar" => "مستفيد",
            "title_en" => "beneficiaries",
            "number" => "2000333",
            "image" => "16903162382.png",
        ]);
        Achievement::create([
            "title_ar" => "مهمات منجزة",
            "title_en" => "Completed missions",
            "number" => "610",
            "image" => "16903162843.png",
        ]);
        Achievement::create([
            "title_ar" => "متبرع",
            "title_en" => "benefactors",
            "number" => "45",
            "image" => "16903163024.png",
        ]);

// -------------------------------------------------------------------------------------

        Report::create([
            "title_ar" => "التقرير الاول",
            "title_en" => "The first report",
            "image" => "1690353828تقرير.jpg",
        ]);
// -------------------------------------------------------------------------------------
        Publication::create([
            "title_ar" => "اصدار جديد",
            "title_en" => "New release",
            "image" => "1690353787اصدار.jpg",
        ]);
// -------------------------------------------------------------------------------------

        Social::create([
            "name_ar" => "تويتر",
            "name_en" => "twitter",
            "icon" => "bx bxl-twitter",
            "link" => "twitter.com",
        ]);
        Social::create([
            "name_ar" => "فيسبوك",
            "name_en" => "facebook",
            "icon" => "bx bxl-facebook",
            "link" => "facebook.com",
        ]);
        Social::create([
            "name_ar" => "انستا",
            "name_en" => "instagram",
            "icon" => "bx bxl-instagram",
            "link" => "instagram.com",
        ]);
        Social::create([
            "name_ar" => "يوتيوب",
            "name_en" => "youtuebe",
            "icon" => "bx bxl-youtube",
            "link" => "youtube.com",
        ]);
        Social::create([
            "name_ar" => "ايميل",
            "name_en" => "email",
            "icon" => "bx bx-envelope",
            "link" => "admin@paeep.ps",
        ]);
// -------------------------------------------------------------------------------------

        $s = Library::create([
            "title_ar" => "الحفل الختامي لمشروع دعم الأسر الهشة من خلال منح نفقدية متعددة الأغراض في قطاع غزة",
            "title_en" => "The closing ceremony of the project to support vulnerable families through multi-purpose grants in the Gaza Strip",
            "description_ar" => "الحفل الختامي لمشروع دعم الأسر الهشة من خلال منح نفقدية متعددة الأغراض في قطاع غزة",
            "description_en" => "The closing ceremony of the project to support vulnerable families through multi-purpose grants in the Gaza Strip",
        ]);
//        $s->images()->create([
//            "filename" => "16903536161.jpg",
//        ]);
//        $s->images()->create([
//            "filename" => "16903536162.jpg",
//        ]);
//        $s->images()->create([
//            "filename" => "16903536163.jpg",
//        ]);
//        $s->images()->create([
//            "filename" => "16903536164.jpg",
//        ]);
//        $s->images()->create([
//            "filename" => "16903536165.jpg",
//        ]);
//        $s->images()->create([
//            "filename" => "16903536166.jpg",
//        ]);
//        $s->images()->create([
//            "filename" => "16903536167.jpg",
//        ]);
//        $s->images()->create([
//            "filename" => "16903536168.jpg",
//        ]);
// -------------------------------------------------------------------------------------










    }
}

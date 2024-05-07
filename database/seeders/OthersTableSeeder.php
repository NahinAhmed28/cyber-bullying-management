<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OthersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();


        DB::table('office_types')->truncate();
        DB::table('office_types')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'code' => '1',
                    'title_en' => 'Branch office',
                    'title_bn' => 'শাখা অফিস',
                    'status' => 1,
                    'created_at' => NOW(),
                    'updated_at' => NOW(),
                )
            // 1 =>
            //     array(
            //         'id' => 2,
            //         'code' => '2',
            //         'title_en' => 'Embassy Office',
            //         'title_bn' => 'দূতাবাস অফিস',
            //         'status' => 1,
            //         'created_at' => NOW(),
            //         'updated_at' => NOW(),
            //     )
        ));

        DB::table('associations')->truncate();
        DB::insert("INSERT INTO `associations` (`id`, `code`, `name`, `title_bn`, `title_en`, `address_bn`, `address_en`, `contact`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
        (1, '1', NULL, 'সৌদি আরব', 'Saudi Arabia', 'বাড়ি: ২৭২/৩, ৯ম তলা, পশ্চিম আগারগাঁও', 'House : 272/3, 9th Floor, West Agargaon', '01712616058', 1, 1, 1, NOW(), NOW())");
        

        DB::table('areas')->truncate();
        DB::insert("INSERT INTO `areas` (`id`, `association_id`, `code`, `name`, `title_bn`, `title_en`, `address_bn`, `address_en`, `contact`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
        (1, 1, '1', NULL, 'সৌদি আরব দূতাবাস', 'Embassy of Saudi Arabia', 'বাড়ি 5 (NE) L, রোড 83, গুলশান-2 1212. ঢাকা', 'House 5 (NE) L,Road 83,Gulshan-2 1212. Dhaka', '028829333', 1, 1, NULL, NOW(), NOW())");

        DB::table('branches')->truncate();
        DB::insert("INSERT INTO `branches` (`id`, `office_type_id`, `association_id`, `area_id`, `code`, `name`, `title_bn`, `title_en`, `address_en`, `address_bn`, `latitude`, `longitude`, `email`, `contact`, `long_url`, `short_url`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
        (1, 1, 1, 1, '1001', NULL, 'বুড়াইধা শাখা', 'BURAIDHA BRANCH', 'Buraidha Ishara Wihdah, Banglai Market, Beside Of Rafa Super market & Beside Of Akhi Store 02', 'বাড়ি: ২৭২/৩, ৯ম তলা, পশ্চিম আগারগাঁও', '26.3315024', '43.9720396', NULL, '0549039596', 'https://www.google.com/maps/place/BURAIDHA+EDC+(%E0%A6%AC%E0%A7%81%E0%A6%B0%E0%A6%BE%E0%A6%87%E0%A6%A6%E0%A6%BE+%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%AC%E0%A6%BE%E0%A6%B8%E0%A7%80+%E0%A6%B8%E0%A7%87%E0%A6%AC%E0%A6%BE+%E0%A6%95%E0%A7%87%E0%A6%A8%E0%A7%8D%E0%A6%A6%E0%A7%8D%E0%A6%B0+)/@26.3315024,43.9720396,17z/data=!3m1!4b1!4m6!3m5!1s0x157f59555cdac55b:0x43518519d01045b!8m2!3d26.3315024!4d43.9720396!16s%2Fg%2F11swdn27st?hl=en&entry=ttu', 'https://goo.gl/maps/MeTh4nP4bdtp4nVX9', 1, 1, 1, '2023-06-18 06:17:16', '2023-07-05 07:32:33'),
        (2, 1, 1, 1, '1002', NULL, 'রিয়াদ বাথা শাখা', 'RIYADH BATHA BRANCH', 'Head Office: King Faysal Road Near Dhaka Medical, Shamshiya Building (3rd Floor).', 'প্রধান কার্যালয়: ঢাকা মেডিকেলের কাছে কিং ফয়সাল রোড, শামশিয়া বিল্ডিং (৩য় তলা)।', '24.642751989560207', '46.71428408280888', NULL, '0112761564', 'https://www.google.com/maps/place/EDC+a2i/@24.6426691,46.7144021,17z/data=!3m1!4b1!4m6!3m5!1s0x3e2f05ac962dae9d:0x51975fe255fb4380!8m2!3d24.6426691!4d46.7144021!16s%2Fg%2F11hcslrtqw?entry=ttu', 'https://goo.gl/maps/oCE8M9oyTAcn2KPfA', 1, 1, 1, '2023-06-18 06:39:26', '2023-07-05 07:30:36'),
        (3, 1, NULL, 1, '1003', NULL, 'জুবাইল শাখা', 'JUBAIL BRANCH', 'King Abdul Aziz Road, Beside Jubail\r\nCentre Elite Tower Hotel', 'কিং আব্দুল আজিজ রোড, জুবাইলের পাশে\r\nসেন্টার এলিট টাওয়ার হোটেল', '27.0120532', '49.6609404', 'edcaljuball@gmail.com', '0502388874', 'https://www.google.com/maps/place/(EDC)+Bangladesh+Passport+Office+-+Jubail+Branch/@27.0120532,49.6609404,17z/data=!3m1!4b1!4m6!3m5!1s0x3e35a11a6339bda7:0x16f53c75f5f1d8!8m2!3d27.0120532!4d49.6609404!16s%2Fg%2F11lq382bzr?entry=ttu', 'https://maps.app.goo.gl/w4nLP1DsV5oVFgHg8', 1, 1, NULL, '2023-07-05 07:34:50', '2023-07-05 07:34:50')");


        DB::table('categories')->truncate();
        DB::insert("INSERT INTO `categories` (`id`, `code`, `name`, `title_bn`, `title_en`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
        (1, '1', NULL, 'ডিফল্ট', 'Default', 1, 1, NULL, NOW(), NOW())");


        DB::table('service_types')->truncate();
        DB::insert("INSERT INTO `service_types` (`id`, `code`, `name`, `title_bn`, `title_en`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
        (1, '1', NULL, 'পররাষ্ট্র মন্ত্রণালয়', 'MOEWOE', 1, 1, NULL, '2023-07-05 07:40:16', '2023-07-05 07:40:16'),
        (2, '2', NULL, 'কর্মসংস্থান মন্ত্রণালয়', 'MOFA', 1, 1, NULL, '2023-07-05 07:40:16', '2023-07-05 07:40:16'),
        (3, '3', NULL, 'সব', 'All', 1, 1, NULL, '2023-07-06 04:45:49', '2023-07-06 04:45:49')");
        

        DB::table('services')->truncate();
        DB::insert("INSERT INTO `services` (`id`, `category_id`, `service_type_id`, `code`, `name`, `title_bn`, `title_en`, `govt_charge`, `service_charge`, `total_charge`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
        (1, 1, 3, '1', NULL, 'পাসপোর্ট রি-ইস্যু', 'Passport Re-Issue', 100.00, 200.00, 300.00, 1, 1, 1, '2023-07-04 09:36:52', '2023-07-04 09:38:31'),
        (2, 1, 1, '2', NULL, 'প্রবাসী কল্যাণ কার্ড', 'Expatriate Welfare Card', 200.00, 300.00, 500.00, 1, 1, 1, '2023-07-04 09:36:52', '2023-07-04 09:39:26'),
        (3, 1, 2, '3', NULL, 'ডকুমেন্টস সত্যায়ন', 'Attestation of documents', 100.00, 200.00, 300.00, 1, 1, NULL, '2023-07-04 09:40:29', '2023-07-04 09:40:29'),
        (4, 1, 1, '4', NULL, 'পাসপোর্ট নবায়ন প্রতি বছর', 'Passport renewal every year', 2000.00, 200.00, 2200.00, 1, 1, NULL, '2023-07-04 09:41:08', '2023-07-04 09:41:08'),
        (5, 1, 1, '5', NULL, 'ডুপ্লিকেট জন্ম নিবন্ধন এবং জন্ম নিবন্ধন তথ্য সংশোধণের আবেদন', 'Duplicate birth registration and application for correction of birth registration information', 2500.00, 200.00, 2700.00, 1, 1, NULL, '2023-07-04 09:41:33', '2023-07-04 09:41:33'),
        (6, 1, 2, '6', NULL, 'সৌদি পুলিশ ক্লিয়ারেন্স জন্য দূতাবাসের সুপারিশ পত্র', 'Embassy recommendation letter for Saudi Police Clearance', 5000.00, 1000.00, 6000.00, 1, 1, NULL, '2023-07-04 09:43:59', '2023-07-04 09:43:59'),
        (7, 1, 1, '7', NULL, 'ট্রাভেল পার্মিট', 'Travel permit', 1000.00, 50.00, 1050.00, 1, 1, NULL, '2023-07-04 09:44:31', '2023-07-04 09:44:31'),
        (8, 1, 2, '8', NULL, 'ভিনদেশি নাগরিকদের জন্য বাংলাদেশী ভিসার অনলাইন আবেদন।', 'Online application of Bangladesh visa for foreign nationals.', 2000.00, 100.00, 2100.00, 1, 1, NULL, '2023-07-04 09:45:09', '2023-07-04 09:45:09')");
        

        DB::table('designations')->truncate();
        DB::insert("INSERT INTO `designations` (`id`, `code`, `name`, `title_bn`, `title_en`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
        (1, '1', NULL, 'মাস্টার এডমিন', 'Master Admin', 1, 1, NULL, '2023-09-04 08:54:29', '2023-09-04 08:54:29'),
        (2, '2', NULL, 'সিস্টেম এডমিন', 'System Admin', 1, 1, NULL, '2023-09-04 08:54:52', '2023-09-04 08:54:52'),
        (3, '3', NULL, 'এডমিন', 'Admin', 1, 1, NULL, '2023-09-04 08:55:15', '2023-09-04 08:55:15'),
        (4, '4', NULL, 'উপদেষ্টা', 'Adviser', 1, 1, NULL, '2023-09-04 08:58:55', '2023-09-04 08:58:55'),
        (5, '5', NULL, 'সভাপতি (জেলা কমিটি)', 'President (District Committee)', 1, 1, 3, '2023-09-04 09:00:57', '2023-09-23 19:06:52'),
        (6, '6', NULL, 'সভাপতি (কেন্দ্রীয় কমিটি)', 'President (Central Committee)', 1, 1, 3, '2023-09-04 09:01:44', '2023-09-23 19:23:06'),
        (8, '8', NULL, 'সদস্য-সচিব (জেলা কমিটি)', 'Member Secretary (District Committee)', 1, 1, 3, '2023-09-04 09:04:33', '2023-09-23 19:54:54'),
        (9, '9', NULL, 'সদস্য (জেলা কমিটি)', 'Member (District Committee)', 1, 3, 3, '2023-09-23 19:14:36', '2023-09-23 19:54:41'),
        (10, '10', NULL, 'সদস্য-সচিব (কেন্দ্রীয় কমিটি)', 'Member Secretary (Central Committee)', 1, 3, NULL, '2023-09-23 19:24:26', '2023-09-23 19:24:26'),
        (11, '11', NULL, 'সদস্য (কেন্দ্রীয় কমিটি)', 'Member (Central Committee)', 1, 3, NULL, '2023-09-23 20:04:14', '2023-09-23 20:04:14')");
        

        DB::table('case_types')->truncate();
        DB::insert("INSERT INTO `case_types` (`id`, `code`, `name`, `title_bn`, `title_en`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
        (1, '1', NULL, 'অতীব জরুরী', 'Most Important', 1, 1, 3, '2023-09-13 05:23:31', '2023-09-23 18:52:21'),
        (2, '2', NULL, 'জরুরী', 'Important', 1, 3, NULL, '2023-09-23 18:52:48', '2023-09-23 18:52:48'),
        (3, '3', NULL, 'সাধারণ', 'General', 1, 3, 3, '2023-09-23 18:53:20', '2023-09-23 18:53:46')");

        DB::table('case_statuses')->truncate();
        DB::insert("INSERT INTO `case_statuses` (`id`, `code`, `name`, `title_bn`, `title_en`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
        (1, '1', NULL, 'খসড়া', 'Draft', 1, 3, 3, '2023-09-25 12:12:06', '2023-10-01 21:14:06'),
        (2, '2', NULL, 'পেন্ডিং', 'Pending', 1, 3, 3, '2023-09-25 12:12:06', '2023-10-01 21:14:06'),
        (3, '3', NULL, 'ডিক্লাইনেড', 'Declined', 1, 3, 3, '2023-09-25 12:12:06', '2023-10-01 21:14:06'),
        (4, '4', NULL, 'অনুমোদন', 'Approve', 1, 3, 3, '2023-09-25 12:12:06', '2023-10-01 21:14:06'),
        (5, '5', NULL, 'অসম্পূর্ণ', 'Incomplete', 1, 3, 3, '2023-09-25 12:12:48', '2023-10-01 21:12:55'),
        (6, '6', NULL, 'সম্পূর্ণ', 'Complete', 1, 3, NULL, '2023-09-25 12:17:49', '2023-09-25 12:17:49')");

        DB::table('risks')->truncate();
        DB::insert("INSERT INTO `risks` (`id`, `code`, `name`, `title_bn`, `title_en`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
        (1, '1', NULL, 'বিষণ্নতা, উদ্বেগ, মনোযোগহীনতা', 'Depression, Anxiety, Concentrationless', 1, 1, 3, '2023-09-19 10:45:21', '2023-09-25 11:58:12'),
        (2, '2', NULL, 'আত্মহীনমন্যতা, সামাজিক বিচ্ছিন্নতা, অসহায়ত্ব', 'Self-deprecation, Social Isolation, Helplessness', 1, 3, NULL, '2023-09-25 12:02:36', '2023-09-25 12:02:36'),
        (3, '3', NULL, 'আত্মহত্যা প্রবণ', 'Suicidal', 1, 3, NULL, '2023-09-25 12:02:58', '2023-09-25 12:02:58')");

        DB::table('case_categories')->truncate();
        DB::insert("INSERT INTO `case_categories` (`id`, `code`, `name`, `title_bn`, `title_en`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
        (1, '1', NULL, 'সাইবার বুলিং', 'Cyber Bullying', 1, 1, 3, '2023-09-13 05:24:04', '2023-09-23 21:17:27'),
        (3, '3', NULL, 'সাইবার হয়রানি', 'Cyber Harassment', 1, 3, 3, '2023-09-23 21:18:30', '2023-09-23 21:30:35'),
        (4, '4', NULL, 'নকল ছবি (অশ্লীল) বা ব্যক্তিগত ছবি দিয়ে হুমকি', 'Threats with fake pictures (obscene) or personal pictures', 1, 3, 3, '2023-09-23 21:28:08', '2023-09-25 12:19:15'),
        (5, '5', NULL, 'নকল ছবি (অশ্লীল) বা ব্যক্তিগত ছবি অনলাইনে ছড়িয়ে পড়া', 'Spreading fake photos (obscene) or personal photos online', 1, 3, NULL, '2023-09-23 21:31:40', '2023-09-23 21:31:40'),
        (6, '6', NULL, 'হ্যাকিং', 'Hacking', 1, 3, 3, '2023-09-23 21:32:00', '2023-09-25 12:19:26'),
        (7, '7', NULL, 'অন্যান্য', 'Others', 1, 3, NULL, '2023-09-23 21:34:50', '2023-09-23 21:34:50'),
        (8, '8', NULL, 'অনলাইনে প্রতারণা', 'Online Fraud', 1, 3, NULL, '2023-09-25 12:20:27', '2023-09-25 12:20:27')");

        DB::table('office_designations')->truncate();
        DB::insert("INSERT INTO `office_designations` (`id`, `code`, `name`, `title_bn`, `title_en`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
        (1, '1', NULL, 'জেলা প্রশাসক ও জেলা ম্যাজিস্ট্রেট', 'Deputy Commissioner & District Magistrate', 1, 3, NULL, '2023-09-23 19:59:06', '2023-09-23 19:59:06'),
        (2, '2', NULL, 'পুলিশ সুপার', 'Superintendent of Police', 1, 3, NULL, '2023-09-23 19:59:55', '2023-09-23 19:59:55'),
        (3, '3', NULL, 'অতিরিক্ত জেলা প্রশাসক (শিক্ষা ও আইসিটি)', 'Additional Deputy Commissioner (Education & ICT)', 1, 3, NULL, '2023-09-23 20:01:57', '2023-09-23 20:01:57')");

        DB::table('applications')->truncate();
        DB::insert("INSERT INTO `applications` (`id`, `code`, `division_id`, `district_id`, `upazila_id`, `thana_id`, `case_type_id`, `case_category_id`, `case_status_id`, `risk_id`, `name`, `title_bn`, `title_en`, `email`, `title_details_bn`, `title_details_en`, `dob`, `gender`, `name_bn`, `name_en`, `guardian_bn`, `guardian_en`, `address_bn`, `address_en`, `school_bn`, `school_en`, `class_bn`, `class_en`, `contact`, `guardian_contact`, `age`, `dsign`, `details_bn`, `details_en`, `is_gd`, `gd_thana`, `gd_no`, `gd_date`, `step_date`, `districts`, `upazilas`, `wusers`, `users`, `approval_status`, `status`, `approved_by`, `cancel_by`, `created_by`, `updated_by`, `entry_date`, `created_at`, `updated_at`) VALUES
        (1, '1', 5, 49, 364, 399, 2, 6, 1, NULL, NULL, 'ফেসবুক আইডি হ্যাকিং', 'Facebook ID Hacking', NULL, 'সাকিবের আইডি তে অপরিচিত ব্যক্তির কাছে থেকে লিংক যার মাধ্যমে ঢোকার কয়েক ঘন্টা পরে, আইডিতে আর ঢুকা যাচ্ছিল না।', 'Shakib\'s ID got a link from a stranger through which a few hours later, the ID was no longer accessible.', '2008-07-10', 1, 'সাকিব আহমেদ', 'Sakib Ahmed', 'হাফিজুর রহমান', 'Hafizur Rahman', 'হাজিগঞ্জ, চাঁদপুর, চট্টগ্রাম', 'Hajiganj, Chandpur, Chittagong', 'চাঁদপুর হাই স্কুল', 'Chandpur High School', '৯', '9', '01999109333', '01999988999', 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '[\"49\"]', NULL, NULL, '[163,164]', 0, 1, NULL, NULL, 3, 1, NULL, '2023-09-25 06:48:47', '2023-10-03 05:20:49'),
        (2, '2', 2, 12, 94, 115, 2, 5, 1, NULL, NULL, 'ফেইসবুক থেকে পোস্ট রিমুভ প্রসঙ্গে', 'Regarding post removal from Facebook', NULL, 'অপরাধী ভিক্টিমের ছবি ব্যবহার একটি ফেইসবুকে ফেইক একাউন্ট ক্রিয়েট করে বিভিন্ন কুরুচিপূর্ণ পোস্ট আপলোড করে সম্মানহানির চেষ্টা করছে। এমতাবস্থায় সে এবং তার পরিবার হুমকির মুখে রয়েছে।', 'The criminal is trying to defame the victim by creating a fake Facebook account using the victim\'s photo and uploading various malicious posts. In this situation, he and his family are under threat', '2005-08-14', 0, 'রেহানা পারভিন', 'Rehana parvin', 'অনিক মাহমুদ', 'Anik Mahmud', 'মজিদপুর', 'mojidpur', 'দাউদকান্দি আদর্শ হাই স্কুল', 'Daudkandi Adarsha High School', '১০ম শ্রেণী', 'class-10', '০১৭২১৫৬৭৪৪২', '০১৭২১৫৬৭৪৩২', 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '[\"12\"]', NULL, NULL, '[43,117]', 0, 1, NULL, NULL, 3, 1, NULL, '2023-09-28 12:12:20', '2023-10-03 05:20:24'),
        (3, '3', 4, 39, 297, 268, 1, 4, 1, NULL, NULL, 'অপরাধী কে আইনের আওতায় এনে তার মোবাইল  হতে ভিক্টিমের শেয়ার করা পারসোনাল ডকুমেন্টস রিমুভ করা প্রসঙ্গে', 'In the context of removing the personal documents shared by the victim from his mobile by bringing the criminal under the law', NULL, '১ বছর পূর্বে ভিক্টিমের সাথে অভিযুক্তের প্রেমের সম্পর্ক গড়ে ওঠে এবং ছেলে একপর্যায়ে মেয়ের কিছু নুড পিকচার তাদের মধ্যে আদান-প্রদান হয়। তবে হঠাৎ করেই মেয়ে লক্ষ্য করে ছেলেটির উদ্দেশ্য ভালো নয় সে কারণে মেয়ে ছেলেটির সাথে সম্পর্ক রাখতে না চাইলে ছেলেটি তার নুড পিকচার গুলো ভাইরাল করবে বলে বিভিন্ন ভাবে হুমকি দিয়ে আসছে। এমতাবস্থায় ভিক্টিম আমাদের নিকট সহযোগিতা প্রার্থী। তবে বিষয়টি সে তার পরিবারকে বলতে চাইছে না,, পরিবার জানলে সে আত্মহত্যা করবে বলেও জানিয়েছে।', '1 year ago, the accused developed a romantic relationship with the victim and at one point some nude pictures of the boy and girl were exchanged between them. But suddenly the girl notices that the boy\'s intentions are not good, so if the girl does not want to have a relationship with the boy, the boy has been threatening her in various ways that her nude pictures will go viral. In such a situation, the victim seeks our cooperation. However, he does not want to tell his family, saying that he will commit suicide if the family finds out.', '2007-06-13', 0, 'রিয়া ইসলাম', 'Riya Islam', 'রফিকুল ইসলাম', 'Rofikul Islam', 'ইছাখাদা', 'Ichakhada', 'মাগুরা কালেক্টরেট কলেজিয়েট স্কুল', 'Magura Collectorate Collegiate School', 'নবম শ্রেণী', 'Class-9', '01941234576', '01406798765', 0, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '[\"39\"]', NULL, NULL, '[74,76,107]', 0, 1, NULL, NULL, 3, 1, NULL, '2023-09-28 20:22:22', '2023-10-03 05:19:08')");


        // DB::table('files')->truncate();
        // DB::insert("INSERT INTO `files` (`id`, `application_id`, `code`, `name`, `title_bn`, `title_en`, `thumb`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
        // (1, 1, NULL, NULL, 'প্রমাণ - ১', 'Evidence - 1', NULL, 1, 1, NULL, '2023-09-16 06:06:59', '2023-09-16 07:00:25'),
        // (2, 1, NULL, NULL, 'প্রমাণ - ২', 'Evidence - 2', NULL, 1, 1, NULL, '2023-09-16 06:06:59', '2023-09-16 07:00:25')");


        DB::table('suspects')->truncate();
        DB::insert("INSERT INTO `suspects` (`id`, `application_id`, `code`, `name`, `title_bn`, `title_en`, `thumb`, `suspicious_dob`, `suspicious_gender`, `suspicious_name_bn`, `suspicious_name_en`, `suspicious_guardian_bn`, `suspicious_guardian_en`, `suspicious_address_bn`, `suspicious_address_en`, `suspicious_school_bn`, `suspicious_school_en`, `suspicious_class_bn`, `suspicious_class_en`, `suspicious_contact`, `suspicious_guardian_contact`, `suspicious_age`, `suspicious_details_bn`, `suspicious_details_en`, `ssign`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
        (1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'মোঃ ফারদিন', 'Md. Fardin', 'মোঃ একরামুল', 'Md. Ekramul', 'গুলবাজ, ভাটাপাড়া, রাজশাহী', 'Gulbaj, Vatapara, Rajshahi', NULL, NULL, NULL, NULL, '01712616057', '01712616057', 25, 'একজন সাধারণ মুসলিম পুরুষের মতো দেখতে একটি পার্শ্ব প্রতিক্রিয়া হল যে লোকেরা মনে করে যে তারা তাদের কষ্টগুলি আমার সাথে ভাগ করে নিতে পারে। এবং আজকের দিনে এবং যুগে পুরুষরা যে সবচেয়ে উল্লেখযোগ্য কষ্ট ভোগ করে তার মধ্যে একটি হল নারী এবং তাদের পোশাক।', 'One side effect of looking like a typical Muslim male is that people think they can share their hardships with me. And one of the most notable hardships that men in today\'s day and age suffer from has to be women, and their clothing.', NULL, 1, 1, 1, '2023-09-17 14:59:01', '2023-09-19 06:59:50'),
        (2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'মোঃ ফারদিন খান', 'Md. Fardin Khan', 'মোঃ একরামুল খান', 'Md. Ekramul Khan', 'গুলবাজ, ভাটাপাড়া, রাজশাহী', 'Gulbaj, Vatapara, Rajshahi', NULL, NULL, NULL, NULL, '01712616053', '01712616053', 30, 'একজন সাধারণ মুসলিম পুরুষের মতো দেখতে একটি পার্শ্ব প্রতিক্রিয়া হল যে লোকেরা মনে করে যে তারা তাদের কষ্টগুলি আমার সাথে ভাগ করে নিতে পারে। এবং আজকের দিনে এবং যুগে পুরুষরা যে সবচেয়ে উল্লেখযোগ্য কষ্ট ভোগ করে তার মধ্যে একটি হল নারী এবং তাদের পোশাক।', 'One side effect of looking like a typical Muslim male is that people think they can share their hardships with me. And one of the most notable hardships that men in today\'s day and age suffer from has to be women, and their clothing.', NULL, 1, 1, 1, '2023-09-17 14:59:01', '2023-09-19 06:59:51'),
        (3, 2, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'মোঃ ফারদিন', 'Md. Fardin', 'মোঃ একরামুল', 'Md. Ekramul', 'গুলবাজ, ভাটাপাড়া, রাজশাহী', 'Gulbaj, Vatapara, Rajshahi', NULL, NULL, NULL, NULL, '01712616057', '01712616057', 25, 'একজন সাধারণ মুসলিম পুরুষের মতো দেখতে একটি পার্শ্ব প্রতিক্রিয়া হল যে লোকেরা মনে করে যে তারা তাদের কষ্টগুলি আমার সাথে ভাগ করে নিতে পারে। এবং আজকের দিনে এবং যুগে পুরুষরা যে সবচেয়ে উল্লেখযোগ্য কষ্ট ভোগ করে তার মধ্যে একটি হল নারী এবং তাদের পোশাক।', 'One side effect of looking like a typical Muslim male is that people think they can share their hardships with me. And one of the most notable hardships that men in today\'s day and age suffer from has to be women, and their clothing.', NULL, 1, 1, 1, '2023-09-17 14:59:01', '2023-09-19 06:59:50'),
        (4, 2, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'মোঃ ফারদিন খান', 'Md. Fardin Khan', 'মোঃ একরামুল খান', 'Md. Ekramul Khan', 'গুলবাজ, ভাটাপাড়া, রাজশাহী', 'Gulbaj, Vatapara, Rajshahi', NULL, NULL, NULL, NULL, '01712616053', '01712616053', 30, 'একজন সাধারণ মুসলিম পুরুষের মতো দেখতে একটি পার্শ্ব প্রতিক্রিয়া হল যে লোকেরা মনে করে যে তারা তাদের কষ্টগুলি আমার সাথে ভাগ করে নিতে পারে। এবং আজকের দিনে এবং যুগে পুরুষরা যে সবচেয়ে উল্লেখযোগ্য কষ্ট ভোগ করে তার মধ্যে একটি হল নারী এবং তাদের পোশাক।', 'One side effect of looking like a typical Muslim male is that people think they can share their hardships with me. And one of the most notable hardships that men in today\'s day and age suffer from has to be women, and their clothing.', NULL, 1, 1, 1, '2023-09-17 14:59:01', '2023-09-19 06:59:51'),
        (5, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'মোঃ ফারদিন', 'Md. Fardin', 'মোঃ একরামুল', 'Md. Ekramul', 'গুলবাজ, ভাটাপাড়া, রাজশাহী', 'Gulbaj, Vatapara, Rajshahi', NULL, NULL, NULL, NULL, '01712616057', '01712616057', 25, 'একজন সাধারণ মুসলিম পুরুষের মতো দেখতে একটি পার্শ্ব প্রতিক্রিয়া হল যে লোকেরা মনে করে যে তারা তাদের কষ্টগুলি আমার সাথে ভাগ করে নিতে পারে। এবং আজকের দিনে এবং যুগে পুরুষরা যে সবচেয়ে উল্লেখযোগ্য কষ্ট ভোগ করে তার মধ্যে একটি হল নারী এবং তাদের পোশাক।', 'One side effect of looking like a typical Muslim male is that people think they can share their hardships with me. And one of the most notable hardships that men in today\'s day and age suffer from has to be women, and their clothing.', NULL, 1, 1, 1, '2023-09-17 14:59:01', '2023-09-19 06:59:50'),
        (6, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'মোঃ ফারদিন খান', 'Md. Fardin Khan', 'মোঃ একরামুল খান', 'Md. Ekramul Khan', 'গুলবাজ, ভাটাপাড়া, রাজশাহী', 'Gulbaj, Vatapara, Rajshahi', NULL, NULL, NULL, NULL, '01712616053', '01712616053', 30, 'একজন সাধারণ মুসলিম পুরুষের মতো দেখতে একটি পার্শ্ব প্রতিক্রিয়া হল যে লোকেরা মনে করে যে তারা তাদের কষ্টগুলি আমার সাথে ভাগ করে নিতে পারে। এবং আজকের দিনে এবং যুগে পুরুষরা যে সবচেয়ে উল্লেখযোগ্য কষ্ট ভোগ করে তার মধ্যে একটি হল নারী এবং তাদের পোশাক।', 'One side effect of looking like a typical Muslim male is that people think they can share their hardships with me. And one of the most notable hardships that men in today\'s day and age suffer from has to be women, and their clothing.', NULL, 1, 1, 1, '2023-09-17 14:59:01', '2023-09-19 06:59:51')");


        // DB::table('steps')->truncate();
        // DB::insert("INSERT INTO `steps` (`id`, `application_id`, `code`, `name`, `step_details_en`, `step_details_bn`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
        // (1, 1, NULL, NULL, 'Khandaker Farzana Rahman, chair of criminology department, Dhaka University, emphasised on family’s role in preventing cyber bullying. She said, first of all it is essential to give sex education to children. That way they will learn to behave respectfully towards the opposite gender.', 'ঢাকা বিশ্ববিদ্যালয়ের ক্রিমিনোলজি বিভাগের চেয়ারম্যান খন্দকার ফারজানা রহমান সাইবার বুলিং প্রতিরোধে পরিবারের ভূমিকার ওপর জোর দেন। তিনি বলেন, সবার আগে শিশুদের যৌন শিক্ষা দেওয়া অপরিহার্য। এইভাবে তারা বিপরীত লিঙ্গের প্রতি শ্রদ্ধাশীল আচরণ করতে শিখবে।', 1, 1, 1, '2023-09-20 04:43:06', '2023-09-20 05:00:05')");


        Schema::enableForeignKeyConstraints();

    }
}
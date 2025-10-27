<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\empCategory;
use App\Models\Position;
use App\Models\Employee;

class LeaderShipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Rahbariyat kategoriyasini yaratish
        $rahbariyatCategory = empCategory::firstOrCreate([
            'name_uz' => 'Rahbariyat',
            'name_ru' => 'Руководство'
        ]);

        // Lavozimlarni yaratish
        $direktorPosition = Position::firstOrCreate([
            'name_uz' => 'Direktor',
            'name_ru' => 'Директор'
        ]);

        $zamDirektorPosition = Position::firstOrCreate([
            'name_uz' => 'Zam direktor',
            'name_ru' => 'Заместитель директора'
        ]);

        $manaviyatchiPosition = Position::firstOrCreate([
            'name_uz' => 'M\'anaviyatchi',
            'name_ru' => 'Духовный наставник'
        ]);

        // Direktor yaratish
        Employee::firstOrCreate([
            'name_uz' => 'Ikromjon Bekbutaev',
            'name_ru' => 'Икромжон Бекбутаев',
            'email' => 'direktor@maktab.uz',
            'phone' => '+998 88 121 68 86',
            'work_time' => '08:00 - 17:00',
            'category_id' => $rahbariyatCategory->id,
            'position_id' => $direktorPosition->id,
            'image' => 'default.jpg'
        ]);

        // Zam direktor yaratish
        Employee::firstOrCreate([
            'name_uz' => 'Aripova Umida Djangirovna',
            'name_ru' => 'Арипова Умида Джангировна',
            'email' => 'zam.direktor@maktab.uz',
            'phone' => '+998 90 123 45 67',
            'work_time' => '08:00 - 16:00',
            'category_id' => $rahbariyatCategory->id,
            'position_id' => $zamDirektorPosition->id,
            'image' => 'default.jpg'
        ]);

        // M'anaviyatchi yaratish
        Employee::firstOrCreate([
            'name_uz' => 'Karimova Malika',
            'name_ru' => 'Каримова Малика',
            'email' => 'manaviyatchi@maktab.uz',
            'phone' => '+998 91 234 56 78',
            'work_time' => '09:00 - 15:00',
            'category_id' => $rahbariyatCategory->id,
            'position_id' => $manaviyatchiPosition->id,
            'image' => 'default.jpg'
        ]);
    }
}

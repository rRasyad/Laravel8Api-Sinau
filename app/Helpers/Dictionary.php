<?php

namespace App\Helpers;

class Dictionary
{
    public $vocab = [
        "1" => [
            ['Sugeng', 'Selamat', '1'], ['Enjing', 'Pagi', '2'], ['Siang', 'Siang', '3'], ['Sonten', 'Sore', '4'], ['Ndalu', 'Malam', '5'], ['Rawuh', 'Datang', '6'], ['Pripun', 'Bagaimana', '7'], ['Piye', 'Bagaimana', '8'], ['Kabare', 'Kabar', '9'], ['Apik', 'Baik', '10'], ['Matur', 'Terima', '11'], ['Nuwun', 'Kasih', '12'], ['Sae', 'Baik', '13'], ['Biasa', 'Biasa', '14'], ['Wae', 'Saja', '15'], ['Suwe', 'Lama', '16'], ['Ora', 'Tidak', '17'], ['Ketemu', 'Bertemu', '18'], ['Aku', 'Aku', '19'], ['Kangen', 'Rindu', '20'], ['Kowe', 'Kamu', '21'], ['Ana', 'Ada', '22'], ['Kabar', 'Kabar', '23'], ['Apa', 'Apa', '24'], ['Sami-sami', 'Sama-sama', '25'], ['Mangga', 'Silahkan', '26'], ['Pinarak', 'Masuk', '27']
        ],
        "2" => [
            ['Kula nuwun', 'Permisi', '1'], ['Nuwun sewu', 'Permisi', '2'], ['Nami', 'Nama', '3'], ['Asma', 'Nama', '4'], ['Kula', 'Saya', '5'], ['Budi', 'Budi', '6'], ['Adi', 'Adi', '7'], ['Lair', 'Lahir', '8'], ['Ing', 'Di', '9'], ['Suroboyo', 'Surabaya', '10'], ['Panjenengan', 'Anda', '11'], ['Saking', 'Dari', '12'], ['Pundi', 'Mana', '13'], ['Sakniki', 'Sekarang', '14'], ['Sampun', 'Sudah', '15'], ['Umur', 'Umur', '16'], ['16', '16', '17'], ['Taun', 'Tahun', '18'], ['Sopo', 'Siapa', '19'], ['Sinten', 'Siapa', '20'], ['Bapak', 'Ayah', '21'], ['Ibuk', 'Ibu', '22'], ['Dalem', 'Rumah', '23'], ['Teng pundi', 'Dimana', '24']
        ],
        "3" => [
            ['Aku', 'Saya', 'A'], ['Kowe', 'Kamu', 'B'], ['Awakdhewe', 'Kita', 'C'], ['Deweke', 'Dia', 'D'], ['Iki', 'Ini', 'E'], ['Iku', 'Itu', 'F'], ['Opo', 'Apa', 'G'], ['Kapan', 'Kapan', 'H'], ['Ngendhi', 'Dimana', 'I'], ['Sing endhi', 'Yang mana', 'J'], ['Sopo', 'Siapa', 'K'], ['Ngopo', 'Mengapa', 'L'],  ['Yo', 'Ya', 'N'], ['Ora', 'Tidak', 'O'], ['Menowo', 'Barangkali', 'P'], ['Siji', 'Satu', 'Q'], ['Loro', 'Dua', 'R'], ['Telu', 'Tiga', 'S'], ['Papat', 'Empat', 'T'], ['Dalan', 'Jalan', 'U'], ['Kiro-kiro', 'Kira-kira', 'V'], ['Kabeh', 'Semua', 'W'], ['Luwih', 'Lebih', 'X'], ['Banget', 'Sangat', 'Y'], ['Anyar', 'Baru', 'Z'], ['Wingi', 'Kemarin', 'AA'], ['Lara', 'Sakit', 'AB'], ['Ngapunten', 'Maaf', 'AC'], ['Esuk', 'Pagi', 'AD'], ['Awan', 'Siang', 'AE'], ['Bengi', 'Malam', 'AF'], ['Piro', 'Berapa', 'AG'], ['Monggo', 'Silahkan', 'AH'], ['Nuwun', 'Terima kasih', 'AI'], ['Teko', 'Datang', 'AJ'], ['Mlaku', 'Berjalan', 'AK'], ['Omong', 'Bicara', 'AL'], ['Ngomong', 'Bilang', 'AM'], ['Ndelok', 'Melihat', 'AN'], ['Ngerti', 'Mengerti', 'AO'], ['Mangan', 'Makan', 'AP'], ['Ngombe', 'Minum', 'AQ'], ['Krungu', 'Mendengar', 'AR'], ['Wenehi', 'Memberi', 'AS'], ['Seneng', 'Suka', 'AT'], ['Pikir', 'Berpikir', 'AU'], ['Nggawe', 'Membuat', 'AV'], ['Lungguh', 'Duduk', 'AW'], ['Tugel', 'Patah', 'AX'], ['Tuku', 'Beli', 'AY'], ['Mandheg', 'Berhenti', 'AZ']
        ]
    ];

    // public const vocab1 = [
    //     "ngoko" => [
    //         "1" => [
    //             ['Aku', 'Saya', 'A'], ['Kowe', 'Kamu', 'B'], ['Awakdhewe', 'Kita', 'C'], ['Deweke', 'Dia', 'D'], ['Iki', 'Ini', 'E'], ['Iku', 'Itu', 'F'], ['Opo', 'Apa', 'G'], ['Kapan', 'Kapan', 'H'], ['Ngendhi', 'Dimana', 'I'], ['Sing endhi', 'Yang mana', 'J'], ['Sopo', 'Siapa', 'K'], ['Ngopo', 'Mengapa', 'L'], ['Piye', 'Bagaimana', 'M'], ['Yo', 'Ya', 'N'], ['Ora', 'Tidak', 'O'], ['Menowo', 'Barangkali', 'P'], ['Siji', 'Satu', 'Q'], ['Loro', 'Dua', 'R'], ['Telu', 'Tiga', 'S'], ['Papat', 'Empat', 'T'], ['Dalan', 'Jalan', 'U'], ['Kiro-kiro', 'Kira-kira', 'V'], ['Kabeh', 'Semua', 'W'], ['Luwih', 'Lebih', 'X'], ['Banget', 'Sangat', 'Y'], ['Anyar', 'Baru', 'Z'], ['Wingi', 'Kemarin', 'AA'], ['Lara', 'Sakit', 'AB'], ['Ngapunten', 'Maaf', 'AC'], ['Esuk', 'Pagi', 'AD'], ['Awan', 'Siang', 'AE'], ['Bengi', 'Malam', 'AF'], ['Piro', 'Berapa', 'AG'], ['Monggo', 'Silahkan', 'AH'], ['Nuwun', 'Terima kasih', 'AI'], ['Teko', 'Datang', 'AJ'], ['Mlaku', 'Berjalan', 'AK'], ['Omong', 'Bicara', 'AL'], ['Ngomong', 'Bilang', 'AM'], ['Ndelok', 'Melihat', 'AN'], ['Ngerti', 'Mengerti', 'AO'], ['Mangan', 'Makan', 'AP'], ['Ngombe', 'Minum', 'AQ'], ['Krungu', 'Mendengar', 'AR'], ['Wenehi', 'Memberi', 'AS'], ['Seneng', 'Suka', 'AT'], ['Pikir', 'Berpikir', 'AU'], ['Nggawe', 'Membuat', 'AV'], ['Lungguh', 'Duduk', 'AW'], ['Tugel', 'Patah', 'AX'], ['Tuku', 'Beli', 'AY'], ['Mandheg', 'Berhenti', 'AZ'],
    //         ],
    //     ],

    //     "kromo" => [
    //         "1" => [
    //             ['Sugeng', 'Selamat', '1'], ['Enjing', 'Pagi', '2'], ['Siang', 'Siang', '3'], ['Sonten', 'Sore', '4'], ['Ndalu', 'Malam', '5'], ['Rawuh', 'Datang', '6'],
    //         ]
    //     ],
    // ];

    public $jawaban = [
        "unit1_part1" => [
            ['Selamat', '1'], ['Pagi', '2'], ['Siang', '3'], ['Sore', '4'], ['Malam', '5'], ['Datang', '6'], ['Bagaimana', '7'], ['Bagaimana', '8'], ['Kabar', '9'], ['Baik', '10'], ['Terima', '11'], ['Kasih', '12'], ['Baik', '13'], ['Biasa', '14'], ['Saja', '15'], ['Lama', '16'], ['Tidak', '17'], ['Bertemu', '18'], ['Aku', '19'], ['Rindu', '20'], ['Kamu', '21'], ['Ada', '22'], ['Kabar', '23'], ['Apa', '24'], ['Sama-sama', '25'], ['Silahkan', '26'], ['Masuk', '27'],
            ['Sugeng', '1'], ['Enjing', '2'], ['Siang', '3'], ['Sonten', '4'], ['Ndalu', '5'], ['Rawuh', '6'], ['Pripun', '7'], ['Piye', '8'], ['Kabare', '9'], ['Apik', '10'], ['Matur', '11'], ['Nuwun', '12'], ['Sae', '13'], ['Biasa', '14'], ['Wae', '15'], ['Suwe', '16'], ['Ora', '17'], ['Ketemu', '18'], ['Aku', '19'], ['Kangen', '20'], ['Kowe', '21'], ['Ana', '22'], ['Kabar', '23'], ['Apa', '24'], ['Sami-sami', '25'], ['Mangga', '26'], ['Pinarak', '27']
        ],
    ];

    public $soal = [
        "unit1_part1" => [
            ['Sugeng',  '1'], ['Enjing', '2'], ['Siang', '3'], ['Sonten', '4'], ['Ndalu', '5'], ['Rawuh', '6'], ['Pripun', '7'], ['Piye', '8'], ['Kabare', '9'], ['Apik', '10'], ['Matur', '11'], ['Nuwun', '12'], ['Sae', '13'], ['Biasa', '14'], ['Wae', '15'], ['Suwe', '16'], ['Ora', '17'], ['Ketemu', '18'], ['Aku', '19'], ['Kangen', '20'], ['Kowe', '21'], ['Ana', '22'], ['Kabar', '23'], ['Apa', '24'], ['Sami-sami', '25'], ['Mangga', '26'], ['Pinarak', '27'],
            ['Selamat', '1'], ['Pagi', '2'], ['Siang', '3'], ['Sore', '4'], ['Malam', '5'], ['Datang', '6'], ['Bagaimana', '7'], ['Bagaimana', '8'], ['Kabar', '9'], ['Baik', '10'], ['Terima', '11'], ['Kasih', '12'], ['Baik', '13'], ['Biasa', '14'], ['Saja', '15'], ['Lama', '16'], ['Tidak', '17'], ['Bertemu', '18'], ['Aku', '19'], ['Rindu', '20'], ['Kamu', '21'], ['Ada', '22'], ['Kabar', '23'], ['Apa', '24'], ['Sama-sama', '25'], ['Silahkan', '26'], ['Masuk', '27'],
        ],
        "1" => [
            ['Sugeng Enjing', '1 2'], ['Sugeng Siang', '1 3'], ['Sugeng Sonten', '1 4'], ['Sugeng Ndalu', '1 5'], ['Sugeng Rawuh', '1 6'], ['Piye kabare?', '8 9'], ['Pripun kabare?', '7 9'], ['Apik, Matur Suwun', '10 11 12'], ['Sae, Matur Nuwun', '13 11 12'], ['Biasa wae', '14 15'], ['Suwe ora ketemu', '16 17 18'], ['Aku kangen kowe', '19 20 21'], ['Ana kabar apa?', '22 23 24'], ['Sami-sami', '25'], ['Mangga pinarak', '26 27']
        ],
        "2" => [
            ['Nuwun sewu, Asma kula Budi', '2 4 5 6'], ['Kula lair ing Suroboyo', '5 8 9 10'], ['Panjenengan saking pundi?', '11 12 13'], ['Asma kula Adi', '2 4 7'], ['Nami kula Budi', '3 5 6'], ['Umur kula 16 taun', '16 5 17 18'], ['Sinten asmane panjenengan?', '20 4 11'], ['Dalem e panjenengan teng pundi?', '23 11 24'], ['Bapak teng pundi?', '21 24'], ['Ibuk teng pundi?', '22 24'], ['Panjenengan lair teng pundi?', '11 8 24'], ['Adi ing Suroboyo', '7 9 10'], ['Budi ing Suroboyo', '6 9 10'], ['Budi teng pundi?', '6 24'], ['Adi teng pundi?', '7 24'], ['Kula saking suroboyo', '5 12 10'], ['Nami kula Adi', '3 5 7']
        ],
    ];

    public $arti = [
        "1" => [
            [28, 0, 'Selamat'], [28, 1, 'Pagi'], [29, 0, 'Selamat'], [29, 1, 'Siang'], [30, 0, 'Selamat'], [30, 1, 'Sore'], [31, 0, 'Selamat'], [31, 1, 'Malam'], [32, 0, 'Selamat'], [32, 1, 'Datang'], [33, 0, 'Bagaimana'], [33, 1, 'Kabarnya?'], [34, 0, 'Bagaimana'], [34, 1, 'Kabarnya?'], [35, 0, 'Baik'], [35, 1, 'Terima'], [35, 2, 'Kasih'], [36, 0, 'Baik'], [36, 1, 'Terima'], [36, 2, 'Kasih'], [37, 0, 'Biasa'], [37, 1, 'Saja'], [38, 0, 'Lama'], [38, 1, 'Tidak'], [38, 2, 'Bertemu'], [39, 0, 'Aku'], [39, 1, 'Rindu'], [39, 2, 'Kamu'], [40, 0, 'Ada'], [40, 1, 'Kabar'], [40, 2, 'Apa'], [41, 0, 'Sama-sama'], [42, 0, 'Silahkan'], [42, 1, 'Masuk']
        ],
        "2" => [
            [67, 0, 'Permisi'], [67, 1, 'Nama'], [67, 2, 'Saya'], [67, 3, 'Budi'], [68, 0, 'Saya'], [68, 1, 'Lahir'], [68, 2, 'Di'], [68, 3, 'Surabaya'], [69, 0, 'Anda'], [69, 1, 'Dari'], [69, 2, 'Mana?'], [70, 0, 'Nama'], [70, 1, 'Saya'], [70, 2, 'Adi'], [71, 0, 'Nama'], [71, 1, 'Saya'], [71, 2, 'Budi'], [72, 0, 'Umur'], [72, 1, 'Saya'], [72, 2, '16'], [72, 3, 'Tahun'], [73, 0, 'Siapa'], [73, 1, 'Nama'], [73, 2, 'Anda?'], [74, 0, 'Rumah'], [74, 1, '-nya'], [74, 2, 'Anda'], [74, 3, 'Di-'], [74, 4, 'Mana?'], [75, 0, 'Ayah'], [75, 1, 'Di-'], [75, 2, 'Mana?'], [76, 0, 'Ibu'], [76, 1, 'Di-'], [76, 2, 'Mana?'], [77, 0, 'Anda'], [77, 1, 'Lahir'], [77, 2, 'Di-'], [77, 3, 'Mana?'], [78, 0, 'Adi'], [78, 1, 'Ada di'], [78, 2, 'Surabaya'], [79, 0, 'Budi'], [79, 1, 'Ada di'], [79, 2, 'Surabaya'], [80, 0, 'Budi'], [80, 1, 'Di-'], [80, 2, 'Mana?'], [81, 0, 'Adi'], [81, 1, 'Di-'], [81, 2, 'Mana?'], [82, 0, 'Saya'], [82, 1, 'Dari'], [82, 2, 'Surabaya'], [83, 0, 'Nama'], [83, 1, 'Saya'], [83, 2, 'Adi']
        ],
    ];



    // public const soal1 = [
    //     "u2" => [
    //         ['Aku tuku', 'A AY'], ['Aku mangan', 'A AP'], ['Aku mlaku', 'A AK'], ['Aku ndelok', 'A AN'], ['Aku ngerti', 'A AO'], ['Aku ngombe', 'A AQ'], ['Aku krungu', 'A AR'], ['Aku nggawe', 'A AV'], ['Aku lungguh', 'A AW'], ['Aku ngomong', 'A AM'], ['Aku seneng', 'A AT'], ['Aku mandheg', 'A AZ'], ['Aku lara', 'A AB'],
    //         ['Kowe tuku', 'B AY'], ['Kowe mangan', 'B AP'], ['Kowe mlaku', 'B AK'], ['Kowe ndelok', 'B AN'], ['Kowe ngerti?', 'B AO'], ['Kowe ngombe', 'B AQ'], ['Kowe krungu?', 'B AR'], ['Kowe nggawe', 'B AV'], ['Kowe lungguh', 'B AW'], ['Kowe ngomong', 'B AM'], ['Kowe seneng', 'B AT'], ['Kowe mandheg', 'B AZ'], ['Kowe lara', 'B AB'], ['Kowe ngendhi?', 'B I'],
    //         ['Sing ngendhi iku?', 'J F'], ['Sing ngendhi iki?', 'J E'], ['Iki opo?', 'E G'], ['Opo iki?', 'G E'], ['Iku opo?', 'F G'], ['Opo iku?', 'G F'], ['Iki piro?', 'E AG'], ['Iku piro?', 'F AG'], ['Teko kapan?', 'AJ H'], ['Wingi esuk', 'AA AD'], ['Wingi awan', 'AA AE'], ['Wingi bengi', 'AA AF'],

    //     ],
    //     "u3" => [
    //         ['Aku tuku wingi', 'A AY AA'], ['Aku mlaku esuk', 'A AK AD'], ['Kapan kowe teko?', 'H B AJ'],
    //     ],
    //     "ngoko" => [
    //         "1" => [
    //             "1" => Dictionary::vocab['ngoko']["1"],
    //             "2" => [
    //                 ['Aku tuku', 'A AY'], ['Aku mangan', 'A AP'], ['Aku mlaku', 'A AK'], ['Aku ndelok', 'A AN'], ['Aku ngerti', 'A AO'], ['Aku ngombe', 'A AQ'], ['Aku krungu', 'A AR'], ['Aku nggawe', 'A AV'], ['Aku lungguh', 'A AW'], ['Aku ngomong', 'A AM'], ['Aku seneng', 'A AT'], ['Aku mandheg', 'A AZ'], ['Aku lara', 'A AB'],
    //                 ['Kowe tuku', 'B AY'], ['Kowe mangan', 'B AP'], ['Kowe mlaku', 'B AK'], ['Kowe ndelok', 'B AN'], ['Kowe ngerti?', 'B AO'], ['Kowe ngombe', 'B AQ'], ['Kowe krungu?', 'B AR'], ['Kowe nggawe', 'B AV'], ['Kowe lungguh', 'B AW'], ['Kowe ngomong', 'B AM'], ['Kowe seneng', 'B AT'], ['Kowe mandheg', 'B AZ'], ['Kowe lara', 'B AB'], ['Kowe ngendhi?', 'B I'],
    //                 ['Sing ngendhi iku?', 'J F'], ['Sing ngendhi iki?', 'J E'], ['Iki opo?', 'E G'], ['Opo iki?', 'G E'], ['Iku opo?', 'F G'], ['Opo iku?', 'G F'], ['Iki piro?', 'E AG'], ['Iku piro?', 'F AG'], ['Teko kapan?', 'AJ H'], ['Wingi esuk', 'AA AD'], ['Wingi awan', 'AA AE'], ['Wingi bengi', 'AA AF']
    //             ],
    //             "3" => [
    //                 ['Aku tuku wingi', 'A AY AA'], ['Aku mlaku esuk', 'A AK AD'], ['Kapan kowe teko?', 'H B AJ'],
    //             ],
    //         ],
    //     ],

    //     "kromo" => [
    //         "1" => [
    //             "1" => Dictionary::vocab['kromo']['1'],
    //             "2" => [
    //                 ['Sugeng Enjing', '1 2'], ['Sugeng Siang', '1 3'], ['Sugeng Sonten', '1 4'], ['Sugeng Ndalu', '1 5'], ['Sugeng Rawuh', '1 6'],
    //             ],
    //         ],
    //     ]
    // ];
}

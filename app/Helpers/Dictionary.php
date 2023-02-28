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

    public $soal = [
        "1" => [
            ['Sugeng Enjing', '1 2'], ['Sugeng Siang', '1 3'], ['Sugeng Sonten', '1 4'], ['Sugeng Ndalu', '1 5'], ['Sugeng Rawuh', '1 6'], ['Piye kabare?', '8 9'], ['Pripun kabare?', '7 9'], ['Apik, Matur Suwun', '10 11 12'], ['Sae, Matur Nuwun', '13 11 12'], ['Biasa wae', '14 15'], ['Suwe ora ketemu', '16 17 18'], ['Aku kangen kowe', '19 20 21'], ['Ana kabar apa?', '22 23 24'], ['Sami-sami', '25'], ['Mangga pinarak', '26 27']
        ],
        "2" => [
            ['Nuwun sewu, Asma kula Budi', '2 4 5 6'], ['Kula lair ing Suroboyo', '5 8 9 10'], ['Panjenengan saking pundi?', '11 12 13'], ['Asma kula Adi', '2 4 7'], ['Nami kula Budi', '3 5 6'], ['Umur kula 16 taun', '16 5 17 18'], ['Sinten asmane panjenengan?', '20 4 11'], ['Dalem e panjenengan teng pundi?', '23 11 24'], ['Bapak teng pundi?', '21 24'], ['Ibuk teng pundi?', '22 24'], ['Panjenengan lair teng pundi?', '11 8 24'], ['Adi ing Suroboyo', '7 9 10'], ['Budi ing Suroboyo', '6 9 10'], ['Budi teng pundi?', '6 24'], ['Adi teng pundi?', '7 24'], ['Kula saking suroboyo', '5 12 10'], ['Nami kula Adi', '3 5 7']
        ],
    ];

    public $arti = [
        "1" => [
            [28, 0, 'Selamat'], [28, 1, 'Pagi'], [29, 0, 'Selamat'], [29, 1, 'Siang'], [30, 0, 'Selamat'], [30, 1, 'Sore'], [31, 0, 'Selamat'], [31, 1, 'Malam'], [32, 0, 'Selamat'], [32, 1, 'Datang'], [32, 0, 'Bagaimana'], [32, 1, 'Kabarnya?'], [33, 0, 'Bagaimana'], [33, 1, 'Kabarnya?'], [34, 0, 'Baik'], [34, 1, 'Terima'], [34, 2, 'Kasih'], [35, 0, 'Baik'], [35, 1, 'Terima'], [35, 2, 'Kasih'], [36, 0, 'Biasa'], [36, 1, 'Saja'], [37, 0, 'Lama'], [37, 1, 'Tidak'], [37, 2, 'Bertemu'], [38, 0, 'Aku'], [38, 1, 'Rindu'], [38, 2, 'Kamu'], [39, 0, 'Ada'], [39, 1, 'Kabar'], [39, 2, 'Apa'], [40, 0, 'Sama-sama'], [41, 0, 'Silahkan'], [41, 1, 'Masuk']
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

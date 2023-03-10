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

    /* TODO Perbarui Content Sampai 5 Unit, Perbarui [Jawaban, Soal, Arti](indo-jawa)
    ** U1 Greetings, U2 Introduce, U3 Time, U4 Direction, U5 Describe Item,
    */

    public $jawaban = [
        "U1" => [
            ['Selamat', '1'], ['Pagi', '2'], ['Siang', '3'], ['Sore', '4'], ['Malam', '5'], ['Datang', '6'], ['Bagaimana', '7'], ['Bagaimana', '8'], ['Kabar', '9'], ['Baik', '10'], ['Terima', '11'], ['Kasih', '12'], ['Baik', '13'], ['Biasa', '14'], ['Saja', '15'], ['Lama', '16'], ['Tidak', '17'], ['Bertemu', '18'], ['Aku', '19'], ['Rindu', '20'], ['Kamu', '21'], ['Ada', '22'], ['Kabar', '23'], ['Apa', '24'], ['Sama-sama', '25'], ['Silahkan', '26'], ['Masuk', '27'],
            ['Sugeng', '28'], ['Enjing', '29'], ['Siang', '30'], ['Sonten', '31'], ['Ndalu', '32'], ['Rawuh', '33'], ['Pripun', '34'], ['Piye', '35'], ['Kabare', '36'], ['Apik', '37'], ['Matur', '38'], ['Nuwun', '39'], ['Sae', '40'], ['Biasa', '41'], ['Wae', '42'], ['Suwe', '43'], ['Ora', '44'], ['Ketemu', '45'], ['Aku', '46'], ['Kangen', '47'], ['Kowe', '48'], ['Ana', '49'], ['Kabar', '50'], ['Apa', '51'], ['Sami-sami', '52'], ['Mangga', '53'], ['Pinarak', '54']
        ],
        "U2" => [
            ['Permisi', '1'], ['Permisi', '2'], ['Nama', '3'], ['Nama', '4'], ['Saya', '5'], ['Budi', '6'], ['Adi', '7'], ['Lahir', '8'], ['Di', '9'], ['Surabaya', '10'], ['Anda', '11'], ['Dari', '12'], ['Mana', '13'], ['Sekarang', '14'], ['Sudah', '15'], ['Umur', '16'], [ '16', '17'], ['Tahun', '18'], ['Siapa', '19'], ['Siapa', '20'], ['Ayah', '21'], ['Ibu', '22'], ['Rumah', '23'], ['Dimana', '24'],
            ['Kula nuwun', '25'], ['Nuwun sewu', '26'], ['Nami', '27'], ['Asma', '28'], ['Kula', '29'], ['Budi', '30'], ['Adi', '31'], ['Lair', '32'], ['Ing', '33'], ['Suroboyo', '34'], ['Panjenengan', '35'], ['Saking', '36'], ['Pundi', '37'], ['Sakniki', '38'], ['Sampun', '39'], ['Umur', '40'], ['16', '41'], ['Taun', '42'], ['Sopo', '43'], ['Sinten', '44'], ['Bapak', '45'], ['Ibuk', '46'], ['Dalem', '47'], ['Teng pundi', '48']
        ],
    ];

    public $soal = [
        "U1P1" => [
            ['Sugeng', '1'], ['Enjing', '2'], ['Siang', '3'], ['Sonten', '4'], ['Ndalu', '5'], ['Rawuh', '6'], ['Pripun', '7'], ['Piye', '8'], ['Kabare', '9'], ['Apik', '10'], ['Matur', '11'], ['Nuwun', '12'], ['Sae', '13'], ['Biasa', '14'], ['Wae', '15'], ['Suwe', '16'], ['Ora', '17'], ['Ketemu', '18'], ['Aku', '19'], ['Kangen', '20'], ['Kowe', '21'], ['Ana', '22'], ['Kabar', '23'], ['Apa', '24'], ['Sami-sami', '25'], ['Mangga', '26'], ['Pinarak', '27'],
            ['Selamat', '28'], ['Pagi', '29'], ['Siang', '30'], ['Sore', '31'], ['Malam', '32'], ['Datang', '33'], ['Bagaimana', '34'], ['Bagaimana', '35'], ['Kabar', '36'], ['Baik', '37'], ['Terima', '38'], ['Kasih', '39'], ['Baik', '40'], ['Biasa', '41'], ['Saja', '42'], ['Lama', '43'], ['Tidak', '44'], ['Bertemu', '45'], ['Aku', '46'], ['Rindu', '47'], ['Kamu', '48'], ['Ada', '49'], ['Kabar', '50'], ['Apa', '51'], ['Sama-sama', '52'], ['Silahkan', '53'], ['Masuk', '54']
        ],
        "U1P2" => [
            ['Sugeng Enjing', '1 2'], ['Sugeng Siang', '1 3'], ['Sugeng Sonten', '1 4'], ['Sugeng Ndalu', '1 5'], ['Sugeng Rawuh', '1 6'], ['Piye kabare?', '8 9'], ['Pripun kabare?', '7 9'], ['Apik, Matur Suwun', '10 11 12'], ['Sae, Matur Nuwun', '13 11 12'], ['Biasa wae', '14 15'], ['Suwe ora ketemu', '16 17 18'], ['Aku kangen kowe', '19 20 21'], ['Ana kabar apa?', '22 23 24'], ['Sami-sami', '25'], ['Mangga pinarak', '26 27'],
            ['Selamat Datang', '28 29'], ['Selamat Siang', '28 30'], ['Selamat Sore', '28 31'], ['Selamat Malam', '28 32'], ['Selamat Datang', '28 33'], ['Bagaimana kabarnya?', '35 36'], ['Bagaimana kabarnya?', '34 36'], ['Baik, terima kasih', '37 38 39'], ['Baik, terima kasih', '40 38 39'], ['Biasa saja', '41 42'], ['Lama tidak bertemu', '43 44 45'], ['Aku rindu kamu', '46 47 48'], ['Ada kabar apa?', '49 50 51'], ['Sama-sama', '52'], ['Silahkan masuk', '53 54']
        ],
        "U2P1" => [
            ['Kula nuwun', '1'], ['Nuwun sewu', '2'], ['Nami', '3'], ['Asma', '4'], ['Kula', '5'], ['Budi', '6'], ['Adi', '7'], ['Lair', '8'], ['Ing', '9'], ['Suroboyo', '10'], ['Panjenengan', '11'], ['Saking', '12'], ['Pundi', '13'], ['Sakniki', '14'], ['Sampun', '15'], ['Umur', '16'], ['16', '17'], ['Taun', '18'], ['Sopo', '19'], ['Sinten', '20'], ['Bapak', '21'], ['Ibuk', '22'], ['Dalem', '23'], ['Teng pundi', '24'],
            ['Permisi', '25'], ['Permisi', '26'], ['Nama', '27'], ['Nama', '28'], ['Saya', '29'], ['Budi', '30'], ['Adi', '31'], ['Lahir', '32'], ['Di', '33'], ['Surabaya', '34'], ['Anda', '35'], ['Dari', '36'], ['Mana', '37'], ['Sekarang', '38'], ['Sudah', '39'], ['Umur', '40'], [ '16', '41'], ['Tahun', '42'], ['Siapa', '43'], ['Siapa', '44'], ['Ayah', '45'], ['Ibu', '46'], ['Rumah', '47'], ['Dimana', '48']
        ],
        "U2P2" => [
            ['Nuwun sewu, Asma kula Budi', '2 4 5 6'], ['Kula lair ing Suroboyo', '5 8 9 10'], ['Panjenengan saking pundi?', '11 12 13'], ['Asma kula Adi', '2 4 7'], ['Nami kula Budi', '3 5 6'], ['Umur kula 16 taun', '16 5 17 18'], ['Sinten asmane panjenengan?', '20 4 11'], ['Dalem e panjenengan teng pundi?', '23 11 24'], ['Bapak teng pundi?', '21 24'], ['Ibuk teng pundi?', '22 24'], ['Panjenengan lair teng pundi?', '11 8 24'], ['Adi ing Suroboyo', '7 9 10'], ['Budi ing Suroboyo', '6 9 10'], ['Budi teng pundi?', '6 24'], ['Adi teng pundi?', '7 24'], ['Kula saking suroboyo', '5 12 10'], ['Nami kula Adi', '3 5 7'],
            ['Permisi, Nama saya Budi', '26 28 29 30'], ['Saya lahir di surabaya', '29 32 33 34'], ['Anda dari mana?', '35 36 37'], ['Nama saya Adi', '28 29 31'], ['Nama saya Budi', '27 29 30'], ['Umur saya 16 tahun', '40 29 41 42'], ['Siapa nama anda?', '44 28 35'], ['Rumah anda dimana?', '47 35 48'], ['Ayah dimana?', '45 48'], ['Ibu dimana?', '46 48'], ['Anda lahir dimana?', '35 32 48'], ['Adi di Surabaya', '31 33 34'], ['Budi di Surabaya', '30 33 34'], ['Budi dimana?', '30 48'], ['Adi dimana?', '31 48'], ['Saya dari surabaya', '29 36 34'], ['Nama saya Adi', '27 29 31']
        ],
    ];

    public $arti = [
        "U1P1" => [
            ['Selamat'], ['Pagi'], ['Siang'], ['Sore'], ['Malam'], ['Datang'], ['Bagaimana'], ['Bagaimana'], ['Kabar'], ['Baik'], ['Terima'], ['Kasih'], ['Baik'], ['Biasa'], ['Saja'], ['Lama'], ['Tidak'], ['Bertemu'], ['Aku'], ['Rindu'], ['Kamu'], ['Ada'], ['Kabar'], ['Apa'], ['Sama-sama'], ['Silahkan'], ['Masuk'],
            ['Sugeng'], ['Enjing'], ['Siang'], ['Sonten'], ['Ndalu'], ['Rawuh'], ['Pripun'], ['Piye'], ['Kabare'], ['Apik'], ['Matur'], ['Nuwun'], ['Sae'], ['Biasa'], ['Wae'], ['Suwe'], ['Ora'], ['Ketemu'], ['Aku'], ['Kangen'], ['Kowe'], ['Ana'], ['Kabar'], ['Apa'], ['Sami-sami'], ['Mangga'], ['Pinarak']
        ],
        "U1P2" => [
            [55, 0, 'Selamat'], [55, 1, 'Pagi'], [56, 0, 'Selamat'], [56, 1, 'Siang'], [57, 0, 'Selamat'], [57, 1, 'Sore'], [58, 0, 'Selamat'], [58, 1, 'Malam'], [59, 0, 'Selamat'], [59, 1, 'Datang'], [60, 0, 'Bagaimana'], [60, 1, 'Kabarnya?'], [61, 0, 'Bagaimana'], [61, 1, 'Kabarnya?'], [62, 0, 'Baik'], [62, 1, 'Terima'], [62, 2, 'Kasih'], [63, 0, 'Baik'], [63, 1, 'Terima'], [63, 2, 'Kasih'], [64, 0, 'Biasa'], [64, 1, 'Saja'], [65, 0, 'Lama'], [65, 1, 'Tidak'], [65, 2, 'Bertemu'], [66, 0, 'Aku'], [66, 1, 'Rindu'], [66, 2, 'Kamu'], [67, 0, 'Ada'], [67, 1, 'Kabar'], [67, 2, 'Apa'], [68, 0, 'Sama-sama'], [69, 0, 'Silahkan'], [69, 1, 'Masuk'],
            [70, 0, 'Sugeng'], [70, 1, 'Enjing'], [71, 0, 'Sugeng'], [71, 1, 'Siang'], [72, 0, 'Sugeng'], [72, 1, 'Sonten'], [73, 0, 'Sugeng'], [73, 1, 'Ndalu'], [74, 0, 'Sugeng'], [74, 1, 'Rawuh'], [75, 0, 'Piye'], [75, 1, 'Kabare?'], [76, 0, 'Pripun'], [76, 1, 'Kabare?'], [77, 0, 'Apik'], [77, 1, 'Matur'], [77, 2, 'Suwun'], [78, 0, 'Sae'], [78, 1, 'Matur'], [78, 2, 'Suwun'], [79, 0, 'Biasa'], [79, 1, 'Wae'], [80, 0, 'Suwe'], [80, 1, 'Ora'], [80, 2, 'Ketemu'], [81, 0, 'Aku'], [81, 1, 'Kangen'], [81, 2, 'Kowe'], [82, 0, 'Ana'], [82, 1, 'Kabar'], [82, 2, 'Apa'], [83, 0, 'Sami-sami'], [84, 0, 'Mangga'], [84, 1, 'Pinarak']
        ],
        "U2P1" => [
            ['Permisi'], ['Permisi'], ['Nama'], ['Nama'], ['Saya'], ['Budi'], ['Adi'], ['Lahir'], ['Di'], ['Surabaya'], ['Anda'], ['Dari'], ['Mana'], ['Sekarang'], ['Sudah'], ['Umur'], [ '16'], ['Tahun'], ['Siapa'], ['Siapa'], ['Ayah'], ['Ibu'], ['Rumah'], ['Dimana'],
            ['Kula nuwun'], ['Nuwun sewu'], ['Nami'], ['Asma'], ['Kula'], ['Budi'], ['Adi'], ['Lair'], ['Ing'], ['Suroboyo'], ['Panjenengan'], ['Saking'], ['Pundi'], ['Sakniki'], ['Sampun'], ['Umur'], ['16'], ['Taun'], ['Sopo'], ['Sinten'], ['Bapak'], ['Ibuk'], ['Dalem'], ['Teng pundi'],
        ],
        "U2P2" => [
            [133, 0, 'Permisi'], [133, 1, 'Nama'], [133, 2, 'Saya'], [133, 3, 'Budi'], [134, 0, 'Saya'], [134, 1, 'Lahir'], [134, 2, 'Di'], [134, 3, 'Surabaya'], [135, 0, 'Anda'], [135, 1, 'Dari'], [135, 2, 'Mana?'], [136, 0, 'Nama'], [136, 1, 'Saya'], [136, 2, 'Adi'], [137, 0, 'Nama'], [137, 1, 'Saya'], [137, 2, 'Budi'], [138, 0, 'Umur'], [138, 1, 'Saya'], [138, 2, '16'], [138, 3, 'Tahun'], [139, 0, 'Siapa'], [139, 1, 'Nama'], [139, 2, 'Anda?'], [140, 0, 'Rumah'], [140, 1, '-nya'], [140, 2, 'Anda'], [140, 3, 'Di-'], [140, 4, 'Mana?'], [141, 0, 'Ayah'], [141, 1, 'Di-'], [141, 2, 'Mana?'], [142, 0, 'Ibu'], [142, 1, 'Di-'], [142, 2, 'Mana?'], [143, 0, 'Anda'], [143, 1, 'Lahir'], [143, 2, 'Di-'], [143, 3, 'Mana?'], [144, 0, 'Adi'], [144, 1, 'Ada di'], [144, 2, 'Surabaya'], [145, 0, 'Budi'], [145, 1, 'Ada di'], [145, 2, 'Surabaya'], [146, 0, 'Budi'], [146, 1, 'Di-'], [146, 2, 'Mana?'], [147, 0, 'Adi'], [147, 1, 'Di-'], [147, 2, 'Mana?'], [148, 0, 'Saya'], [148, 1, 'Dari'], [148, 2, 'Surabaya'], [149, 0, 'Nama'], [149, 1, 'Saya'], [149, 2, 'Adi']
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

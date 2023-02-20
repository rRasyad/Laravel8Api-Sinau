<?php

namespace App\Helpers;

class Dictionary
{
    public const vocab = [
        "ngoko" => [
            "1" => [
                ['Aku', 'Saya', 'A'], ['Kowe', 'Kamu', 'B'], ['Awakdhewe', 'Kita', 'C'], ['Deweke', 'Dia', 'D'], ['Iki', 'Ini', 'E'], ['Iku', 'Itu', 'F'], ['Opo', 'Apa', 'G'], ['Kapan', 'Kapan', 'H'], ['Ngendhi', 'Dimana', 'I'], ['Sing endhi', 'Yang mana', 'J'], ['Sopo', 'Siapa', 'K'], ['Ngopo', 'Mengapa', 'L'], ['Piye', 'Bagaimana', 'M'], ['Yo', 'Ya', 'N'], ['Ora', 'Tidak', 'O'], ['Menowo', 'Barangkali', 'P'], ['Siji', 'Satu', 'Q'], ['Loro', 'Dua', 'R'], ['Telu', 'Tiga', 'S'], ['Papat', 'Empat', 'T'], ['Dalan', 'Jalan', 'U'], ['Kiro-kiro', 'Kira-kira', 'V'], ['Kabeh', 'Semua', 'W'], ['Luwih', 'Lebih', 'X'], ['Banget', 'Sangat', 'Y'], ['Anyar', 'Baru', 'Z'], ['Wingi', 'Kemarin', 'AA'], ['Lara', 'Sakit', 'AB'], ['Ngapunten', 'Maaf', 'AC'], ['Esuk', 'Pagi', 'AD'], ['Awan', 'Siang', 'AE'], ['Bengi', 'Malam', 'AF'], ['Piro', 'Berapa', 'AG'], ['Monggo', 'Silahkan', 'AH'], ['Nuwun', 'Terima kasih', 'AI'], ['Teko', 'Datang', 'AJ'], ['Mlaku', 'Berjalan', 'AK'], ['Omong', 'Bicara', 'AL'], ['Ngomong', 'Bilang', 'AM'], ['Ndelok', 'Melihat', 'AN'], ['Ngerti', 'Mengerti', 'AO'], ['Mangan', 'Makan', 'AP'], ['Ngombe', 'Minum', 'AQ'], ['Krungu', 'Mendengar', 'AR'], ['Wenehi', 'Memberi', 'AS'], ['Seneng', 'Suka', 'AT'], ['Pikir', 'Berpikir', 'AU'], ['Nggawe', 'Membuat', 'AV'], ['Lungguh', 'Duduk', 'AW'], ['Tugel', 'Patah', 'AX'], ['Tuku', 'Beli', 'AY'], ['Mandheg', 'Berhenti', 'AZ'],
            ],
        ],

        "kromo" => [
            "1" => [
                ['Sugeng', 'Selamat', '1'], ['Enjing', 'Pagi', '2'], ['Siang', 'Siang', '3'], ['Sonten', 'Sore', '4'], ['Ndalu', 'Malam', '5'], ['Rawuh', 'Datang', '6'],
            ]
        ],
    ];

    public const soal = [
        "ngoko" => [
            "1" => [
                "1" => Dictionary::vocab['ngoko']["1"],
                "2" => [
                    ['Aku tuku', 'A AY'], ['Aku mangan', 'A AP'], ['Aku mlaku', 'A AK'], ['Aku ndelok', 'A AN'], ['Aku ngerti', 'A AO'], ['Aku ngombe', 'A AQ'], ['Aku krungu', 'A AR'], ['Aku nggawe', 'A AV'], ['Aku lungguh', 'A AW'], ['Aku ngomong', 'A AM'], ['Aku seneng', 'A AT'], ['Aku mandheg', 'A AZ'], ['Aku lara', 'A AB'],
                    ['Kowe tuku', 'B AY'], ['Kowe mangan', 'B AP'], ['Kowe mlaku', 'B AK'], ['Kowe ndelok', 'B AN'], ['Kowe ngerti?', 'B AO'], ['Kowe ngombe', 'B AQ'], ['Kowe krungu?', 'B AR'], ['Kowe nggawe', 'B AV'], ['Kowe lungguh', 'B AW'], ['Kowe ngomong', 'B AM'], ['Kowe seneng', 'B AT'], ['Kowe mandheg', 'B AZ'], ['Kowe lara', 'B AB'], ['Kowe ngendhi?', 'B I'],
                    ['Sing ngendhi iku?', 'J F'], ['Sing ngendhi iki?', 'J E'], ['Iki opo?', 'E G'], ['Opo iki?', 'G E'], ['Iku opo?', 'F G'], ['Opo iku?', 'G F'], ['Iki piro?', 'E AG'], ['Iku piro?', 'F AG'], ['Teko kapan?', 'AJ H'], ['Wingi esuk', 'AA AD'], ['Wingi awan', 'AA AE'], ['Wingi bengi', 'AA AF']
                ],
                "3" => [
                    ['Aku tuku wingi', 'A AY AA'], ['Aku mlaku esuk', 'A AK AD'], ['Kapan kowe teko?', 'H B AJ'],
                ],
            ],
        ],

        "kromo" => [
            "1" => [
                "1" => Dictionary::vocab['kromo']['1'],
                "2" => [
                    ['Sugeng Enjing', '1 2'], ['Sugeng Siang', '1 3'], ['Sugeng Sonten', '1 4'], ['Sugeng Ndalu', '1 5'], ['Sugeng Rawuh', '1 6'],
                ],
            ],
        ]
    ];
}

<?php

namespace App\Models\AlurPencairan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Muhammadyunus1072\TrackHistory\HasTrackHistory;
use Spatie\Permission\Models\Role;


class AlurPencairanAlurProses extends Model
{
    use HasFactory, SoftDeletes, HasTrackHistory;

    protected $fillable = [
        'role_id',
        'name',
        'nomor_urut',
    ];

    const ALUR_TERIMA_EMAIL_DARI_PUSAT_DAN_SHARE_KE_ACCOUNTING_EXATA = 'terima_email_dari_pusat_dan_share_ke_accounting_exata';
    const ALUR_SHARE_LIST_CAIR_KE_HS = 'share_list_cair_ke_hs';
    const ALUR_SHARE_LIST_CAIR_KE_FINANCE_U_BLOK_01_TARIK_DATA = 'share_list_cair_ke_finance_u_blok_01_tarik_data';
    const ALUR_MELENGKAPI_REKENING_KOSONG = 'melengkapi_rekening_kosong';
    const ALUR_SHARE_LIST_CAIR_KE_CC = 'share_list_cair_ke_cc';
    const ALUR_KIRIM_GAMBAR_LIST_CAIR_U_DIPOSTING_SALES = 'kirim_gambar_list_cair_u_diposting_sales';
    const ALUR_KIRIM_KONTEN_N20_CAIR_U_DI_POSTING_SALES = 'kirim_konten_n20_cair_u_di_posting_sales';
    const ALUR_KIRIM_ICHIJIKIN_KE_SALES = 'kirim_ichijikin_ke_sales';
    const ALUR_HITUNG_BUAT_DAN_SHARE_KWITANSI_KE_SALES = 'hitung_buat_dan_share_kwitansi_ke_sales';
    const ALUR_CEK_DAN_PRINT_LIST_CAIR = 'cek_dan_print_list_cair';
    const ALUR_TRANSAKSI_KE_BANK = 'transaksi_ke_bank';
    const ALUR_TRANSFER = 'transfer';
    const ALUR_INFO_KE_TIM_GRUB_SELESAI_TRANSFER = 'info_ke_tim_grub_selesai_transfer';
    const ALUR_MUTASI_TRANSFER = 'mutasi_transfer';
    const ALUR_INFO_REK_SALAH_MENCATA_LIST_NAMA_YANG_BELUM_BERHASIL_TRANSFER_REK_MONDAI_DLL = 'info_rek_salah_mencata_list_nama_yang_belum_berhasil_transfer_rek_mondai_dll';
    const ALUR_MELENGKAPI_REKENING_SALAH = 'melengkapi_rekening_salah';
    const ALUR_TRANSFER_SUSULAN = 'transfer_susulan';
    const ALUR_INFO_KE_TIM_GRUB_SELESAI_TRANSFER_SUSULAN = 'info_ke_tim_grub_selesai_transfer_susulan';
    const ALUR_MUTASI_ULANG_SUSULAN = 'mutasi_ulang_susulan';
    const ALUR_POSTING_KONTEN = 'posting_konten';
    const ALUR_KIRIM_INFO_NENKIN_CAIR_KIRIM_LINK_U_LIHAT_KWITANSI_ICHIJIKIN = 'kirim_info_nenkin_cair_kirim_link_u_lihat_kwitansi_ichijikin';
    const ALUR_UPOD_DAN_TESTIMONI = 'upod_dan_testimoni';
    const ALUR_CEK_KWITANSI_YANG_DIKIRIM_SALES = 'cek_kwitansi_yang_dikirim_sales';
    const ALUR_ARSIP_RESI_TRANSFER = 'arsip_resi_transfer';
    const ALUR_BLOK_DAN_ISI_NOMINAL_CAIR_TANGGAL_CAIR = 'blok_dan_isi_nominal_cair_tanggal_cair';
    const ALUR_ARSIP_PRINT_OUT_LIST_CAIR_BESERTA_SLIP_TRANSAKSI_BANK = 'arsip_print_out_list_cair_beserta_slip_transaksi_bank';

    const ALUR_PROSESES = [
        [
            'key' => self::ALUR_TERIMA_EMAIL_DARI_PUSAT_DAN_SHARE_KE_ACCOUNTING_EXATA,
            'name' => 'Terima email dari pusat dan share ke accounting exata',
            'role' => AlurPencairan::ROLE_PAK_NOVI,
            'role_id' => 2
        ],
        [
            'key' => self::ALUR_SHARE_LIST_CAIR_KE_HS,
            'name' => 'Share list cair ke HS ',
            'role' => AlurPencairan::ROLE_ACC_EXATA,
            'role_id' => 3,
        ],
        [
            'key' => self::ALUR_SHARE_LIST_CAIR_KE_FINANCE_U_BLOK_01_TARIK_DATA,
            'name' => 'Share list cair ke Finance u blok 01  tarik data',
            'role' => AlurPencairan::ROLE_ACC_EXATA,
            'role_id' => 3,
        ],
        [
            'key' => self::ALUR_MELENGKAPI_REKENING_KOSONG,
            'name' => 'Melengkapi Rekening Kosong ',
            'role' => AlurPencairan::ROLE_HS,
            'role_id' => 4,
        ],
        [
            'key' => self::ALUR_SHARE_LIST_CAIR_KE_CC,
            'name' => 'Share list cair ke CC',
            'role' => AlurPencairan::ROLE_HS,
            'role_id' => 4,
        ],
        [
            'key' => self::ALUR_KIRIM_GAMBAR_LIST_CAIR_U_DIPOSTING_SALES,
            'name' => 'Kirim gambar list cair u di posting sales',
            'role' => AlurPencairan::ROLE_CC,
            'role_id' => 5,
        ],
        [
            'key' => self::ALUR_KIRIM_KONTEN_N20_CAIR_U_DI_POSTING_SALES,
            'name' => 'Kirim Konten N20% Cair u di posting sales',
            'role' => AlurPencairan::ROLE_CC,
            'role_id' => 5,
        ],
        [
            'key' => self::ALUR_KIRIM_ICHIJIKIN_KE_SALES,
            'name' => 'Kirim ichijikin ke sales ',
            'role' => AlurPencairan::ROLE_CC,
            'role_id' => 5,
        ],
        [
            'key' => self::ALUR_HITUNG_BUAT_DAN_SHARE_KWITANSI_KE_SALES,
            'name' => 'Hitung, buat & Share kwitansi ke sales',
            'role' => AlurPencairan::ROLE_ACC_EXATA,
            'role_id' => 3,
        ],
        [
            'key' => self::ALUR_CEK_DAN_PRINT_LIST_CAIR,
            'name' => 'Cek & Print list cair',
            'role' => AlurPencairan::ROLE_ACC_EXATA,
            'role_id' => 3,
        ],
        [
            'key' => self::ALUR_TRANSAKSI_KE_BANK,
            'name' => 'Transaksi ke Bank ',
            'role' => AlurPencairan::ROLE_PAK_NOVI,
            'role_id' => 2
        ],
        [
            'key' => self::ALUR_TRANSFER,
            'name' => 'Transfer',
            'role' => AlurPencairan::ROLE_PAK_NOVI,
            'role_id' => 2
        ],
        [
            'key' => self::ALUR_INFO_KE_TIM_GRUB_SELESAI_TRANSFER,
            'name' => 'Info ke Tim / Grup selesai Transfer',
            'role' => AlurPencairan::ROLE_PAK_NOVI,
            'role_id' => 2
        ],
        [
            'key' => self::ALUR_MUTASI_TRANSFER,
            'name' => 'Mutasi transfer',
            'role' => AlurPencairan::ROLE_FINANCE,
            'role_id' => 6,
        ],
        [
            'key' => self::ALUR_INFO_REK_SALAH_MENCATA_LIST_NAMA_YANG_BELUM_BERHASIL_TRANSFER_REK_MONDAI_DLL,
            'name' => 'Info Rek Salah (Mencatat list nama yang blm berhasil di Transfer (rek mondai dll))',
            'role' => AlurPencairan::ROLE_FINANCE,
            'role_id' => 6,
        ],
        [
            'key' => self::ALUR_MELENGKAPI_REKENING_SALAH,
            'name' => 'Melengkapi Rekening salah',
            'role' => AlurPencairan::ROLE_HS,
            'role_id' => 4,
        ],
        [
            'key' => self::ALUR_TRANSFER_SUSULAN,
            'name' => 'Transfer susulan',
            'role' => AlurPencairan::ROLE_PAK_NOVI,
            'role_id' => 2
        ],
        [
            'key' => self::ALUR_INFO_KE_TIM_GRUB_SELESAI_TRANSFER_SUSULAN,
            'name' => 'Info ke Tim / Grup selesai Transfer susulan',
            'role' => AlurPencairan::ROLE_PAK_NOVI,
            'role_id' => 2
        ],
        [
            'key' => self::ALUR_MUTASI_ULANG_SUSULAN,
            'name' => 'Mutasi ulang susulan',
            'role' => AlurPencairan::ROLE_FINANCE,
            'role_id' => 6,
        ],
        [
            'key' => self::ALUR_POSTING_KONTEN,
            'name' => 'Posting konten ',
            'role' => AlurPencairan::ROLE_SALES,
            'role_id' => 7
        ],
        [
            'key' => self::ALUR_KIRIM_INFO_NENKIN_CAIR_KIRIM_LINK_U_LIHAT_KWITANSI_ICHIJIKIN,
            'name' => 'Kirim info Nenkin cair, kirim link u lihat Kwitansi + Ichijikin',
            'role' => AlurPencairan::ROLE_SALES,
            'role_id' => 7
        ],
        [
            'key' => self::ALUR_UPOD_DAN_TESTIMONI,
            'name' => 'Upod & Testimoni',
            'role' => AlurPencairan::ROLE_HS,
            'role_id' => 4,
        ],
        [
            'key' => self::ALUR_CEK_KWITANSI_YANG_DIKIRIM_SALES,
            'name' => 'Cek Kwitansi yang di kirim sales',
            'role' => AlurPencairan::ROLE_FINANCE,
            'role_id' => 6,
        ],
        [
            'key' => self::ALUR_ARSIP_RESI_TRANSFER,
            'name' => 'Arsip Resi Transfer',
            'role' => AlurPencairan::ROLE_FINANCE,
            'role_id' => 6,
        ],
        [
            'key' => self::ALUR_BLOK_DAN_ISI_NOMINAL_CAIR_TANGGAL_CAIR,
            'name' => 'Blok & isi nominal cair + tanggal cair',
            'role' => AlurPencairan::ROLE_FINANCE,
            'role_id' => 6,
        ],
        [
            'key' => self::ALUR_ARSIP_PRINT_OUT_LIST_CAIR_BESERTA_SLIP_TRANSAKSI_BANK,
            'name' => 'Arsip print out list cair beserta slip transaksi bank',
            'role' => AlurPencairan::ROLE_ACC_EXATA,
            'role_id' => 3,
        ],
    ];

    protected $guarded = ['id'];

    public function isDeletable()
    {
        return true;
    }

    public function isEditable()
    {
        return true;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function AlurPencairanHistories()
    {
        return $this->belongsTo(AlurPencairanHistory::class)->latest('id');
    }
}

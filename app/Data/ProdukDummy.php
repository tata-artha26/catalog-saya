<?php

declare(strict_types=1);

namespace App\Data;

/**
 * Sumber data sementara untuk Pertemuan 2.
 * Akan diganti dengan Model Eloquent (Produk::all()) di Minggu 4.
 *
 * Data di-generate dari hasil analisa folder `public/img` (8 file, 6 valid).
 * Prinsip clean code: DRY, SRP, expressive naming, single level of abstraction,
 * tanpa magic number/string berulang, dan type-safe.
 *
 * @phpstan-type Produk array{
 *   id: int,
 *   slug: string,
 *   nama: string,
 *   brand: string,
 *   kategori: string,
 *   warna: string,
 *   harga: int,
 *   harga_coret: int|null,
 *   gambar: string,
 *   deskripsi: string,
 *   bahan: string,
 *   ukuran: list<string>,
 *   stok: int,
 *   rating: float,
 *   is_tersedia: bool
 * }
 */
final class ProdukDummy
{
    private const KATEGORI_JERSEY    = 'Jersey';
    private const KATEGORI_SWEATER   = 'Sweater';
    private const KATEGORI_POLO      = 'Polo Shirt';
    private const KATEGORI_TSHIRT    = 'T-Shirt';
    private const KATEGORI_HOODIE    = 'Hoodie';

    private const BRAND_ALTA   = 'Alta';
    private const BRAND_VERTEX = 'Vertex';
    private const BRAND_NEXORA = 'Nexora';
    private const BRAND_GENERIC = 'TokoSaya';

    private const UKURAN_ALL = ['S', 'M', 'L', 'XL'];
    private const UKURAN_POLO_JERSEY = ['S', 'M', 'L', 'XL', 'XXL'];

    /**
     * Cache agar semua() tidak rebuild array setiap pemanggilan.
     *
     * @var array<int, Produk>|null
     */
    private static ?array $cache = null;

    /**
     * Kembalikan semua produk dummy (hasil analisa public/img).
     *
     * Mapping file -> produk:
     * - berkerah.jpeg (468 KB) -> Vintage Jersey Wanderers (hijau tua, kerah polo)
     * - biruuu.jpeg (393 KB) -> Turtleneck Navy
     * - coklat v.jpeg (379 KB) -> Sweater V-Neck Coklat
     * - merah.jpeg (267 KB) -> Crewneck Maroon
     * - polo.jpeg (335 KB) -> Polo Shirt Ungu
     * - WhatsApp Image ... (275 KB) -> Basic T-Shirt Kuning (multi varian warna)
     * - hoodie hijau.jpeg (0 byte/corrupt) -> Hoodie Hijau [perlu perbaikan file]
     * - putih.jpeg (0 byte/corrupt) -> Kaos Putih Basic [perlu perbaikan file]
     *
     * @return array<int, Produk>
     */
    public static function semua(): array
    {
        if (self::$cache !== null) {
            return self::$cache;
        }

        self::$cache = [
            self::make(
                id: 1,
                slug: 'vintage-jersey-wanderers-legacy-alta',
                nama: 'Vintage Jersey Wanderers Legacy',
                brand: self::BRAND_ALTA,
                kategori: self::KATEGORI_JERSEY,
                warna: 'Forest Green - Cream',
                harga: 249000,
                hargaCoret: 349000,
                gambar: 'img/berkerah.jpeg',
                deskripsi: 'Jersey vintage berkerah polo dari Alta. Motif jacquard halus, badge LEGACY singa bordir, detail collar & sleeve stripe cream. Dari analisa gambar: seri Wanderers no.10, style football culture 1998.',
                bahan: 'Polyester jacquard premium, breathable',
                ukuran: self::UKURAN_POLO_JERSEY,
                stok: 24,
                rating: 4.9,
            ),
            self::make(
                id: 2,
                slug: 'turtleneck-sweater-navy-timeless',
                nama: 'Turtleneck Sweater Navy - Timeless Essentials',
                brand: self::BRAND_GENERIC,
                kategori: self::KATEGORI_SWEATER,
                warna: 'Navy / Biru Tua',
                harga: 199000,
                hargaCoret: 259000,
                gambar: 'img/biruuu.jpeg',
                deskripsi: 'Sweater turtleneck navy oversized, soft material & warm. Cocok daily wear, neck rib tinggi, cuff & hem rib rapat. Tagline gambar: Comfort in Every Season.',
                bahan: 'Knit fleece soft, warm & comfortable',
                ukuran: self::UKURAN_ALL,
                stok: 30,
                rating: 4.8,
            ),
            self::make(
                id: 3,
                slug: 'sweater-v-neck-coklat-premium',
                nama: 'Sweater V-Neck Coklat - Simple Comfort Timeless',
                brand: self::BRAND_GENERIC,
                kategori: self::KATEGORI_SWEATER,
                warna: 'Brown / Coklat',
                harga: 189000,
                hargaCoret: 229000,
                gambar: 'img/coklat v.jpeg',
                deskripsi: 'Sweater V-neck coklat dengan list stripe cream di kerah & cuff. Bordir logo V + star di dada. Bahan premium daily essential, dari analisa file coklat v.jpeg.',
                bahan: 'Fleece premium, halus & tidak gerah',
                ukuran: self::UKURAN_ALL,
                stok: 18,
                rating: 4.7,
            ),
            self::make(
                id: 4,
                slug: 'crewneck-sweater-maroon-vertex',
                nama: 'Crewneck Sweater Maroon Vertex',
                brand: self::BRAND_VERTEX,
                kategori: self::KATEGORI_SWEATER,
                warna: 'Maroon / Merah Burgundy',
                harga: 179000,
                hargaCoret: null,
                gambar: 'img/merah.jpeg',
                deskripsi: 'Crewneck classic essentials maroon polos dari Vertex. Soft material, breathable, daily wear. Potongan oversized crewneck, paling simpel untuk layering.',
                bahan: 'Cotton fleece, soft & breathable',
                ukuran: self::UKURAN_ALL,
                stok: 27,
                rating: 4.8,
            ),
            self::make(
                id: 5,
                slug: 'polo-shirt-ungu-nexora-timeless',
                nama: 'Polo Shirt Ungu Nexora - Timeless Essential',
                brand: self::BRAND_NEXORA,
                kategori: self::KATEGORI_POLO,
                warna: 'Purple / Ungu',
                harga: 159000,
                hargaCoret: 199000,
                gambar: 'img/polo.jpeg',
                deskripsi: 'Polo shirt ungu dengan kerah & ujung lengan stripe cream. Kancing logo Nexora, bordir laurel putih di dada. Breathable fabric, all day comfort.',
                bahan: 'Pique cotton premium, breathable',
                ukuran: self::UKURAN_POLO_JERSEY,
                stok: 22,
                rating: 4.9,
            ),
            self::make(
                id: 6,
                slug: 'basic-t-shirt-kuning-nexora',
                nama: 'Basic T-Shirt Kuning Nexora - Simple Style',
                brand: self::BRAND_NEXORA,
                kategori: self::KATEGORI_TSHIRT,
                warna: 'Yellow (varian: White, Black, Gray, Navy)',
                harga: 89000,
                hargaCoret: 119000,
                gambar: 'img/WhatsApp Image 2026-09-21 at 01.01.06.jpeg',
                deskripsi: 'Basic T-Shirt kuning oversized, simple style for everyday. Soft material & breathable, 5 varian warna (yellow, white, black, gray, navy). Dari analisa gambar basic t-shirt.',
                bahan: 'Cotton combed 24s, soft & adem',
                ukuran: self::UKURAN_ALL,
                stok: 45,
                rating: 4.7,
            ),
            // --- File bermasalah (0 byte) tetap dibuat agar mapping 1:1 dengan folder img ---
            self::make(
                id: 7,
                slug: 'hoodie-hijau-oversized-casual',
                nama: 'Hoodie Hijau Oversized - Casual Streetwear',
                brand: self::BRAND_GENERIC,
                kategori: self::KATEGORI_HOODIE,
                warna: 'Hijau',
                harga: 209000,
                hargaCoret: 269000,
                gambar: 'img/hoodie hijau.jpeg',
                deskripsi: 'Hoodie hijau oversized casual. [PERHATIAN: file public/img/hoodie hijau.jpeg 0 byte / corrupt, perlu ganti file gambar. Data tetap dibuat agar mapping lengkap].',
                bahan: 'Fleece hoodie, warm & soft',
                ukuran: self::UKURAN_ALL,
                stok: 0,
                rating: 0.0,
            ),
            self::make(
                id: 8,
                slug: 'kaos-putih-basic-daily-essential',
                nama: 'Kaos Putih Basic - Daily Essential',
                brand: self::BRAND_GENERIC,
                kategori: self::KATEGORI_TSHIRT,
                warna: 'Putih',
                harga: 79000,
                hargaCoret: null,
                gambar: 'img/putih.jpeg',
                deskripsi: 'Kaos putih basic polos untuk daily essential. [PERHATIAN: file public/img/putih.jpeg 0 byte / corrupt, perlu ganti file gambar. Data tetap dibuat agar mapping lengkap].',
                bahan: 'Cotton combed 30s, breathable',
                ukuran: self::UKURAN_ALL,
                stok: 0,
                rating: 0.0,
            ),
        ];

        return self::$cache;
    }

    /**
     * Cari satu produk berdasarkan ID.
     */
    public static function cari(int $id): ?array
    {
        foreach (self::semua() as $produk) {
            if ($produk['id'] === $id) {
                return $produk;
            }
        }

        return null;
    }

    /**
     * Semua produk kecuali satu produk berdasarkan ID (untuk produk terkait).
     *
     * @return array<int, Produk>
     */
    public static function selain(int $id): array
    {
        return array_values(array_filter(
            self::semua(),
            static fn (array $p): bool => $p['id'] !== $id
        ));
    }

    /**
     * Ambil hanya produk yang tersedia (stok > 0 & file tidak corrupt).
     *
     * @return array<int, Produk>
     */
    public static function tersedia(): array
    {
        return array_values(array_filter(
            self::semua(),
            static fn (array $p): bool => $p['is_tersedia']
        ));
    }

    /**
     * Filter berdasarkan kategori (case-insensitive, partial match).
     *
     * @return array<int, Produk>
     */
    public static function perKategori(string $kategori): array
    {
        $keyword = mb_strtolower(trim($kategori));

        return array_values(array_filter(
            self::semua(),
            static fn (array $p): bool => str_contains(mb_strtolower($p['kategori']), $keyword)
        ));
    }

    /**
     * Helper DRY untuk membangun satu produk.
     * Semua validasi & normalisasi terpusat di sini.
     *
     * @param list<string> $ukuran
     * @return Produk
     */
    private static function make(
        int $id,
        string $slug,
        string $nama,
        string $brand,
        string $kategori,
        string $warna,
        int $harga,
        ?int $hargaCoret,
        string $gambar,
        string $deskripsi,
        string $bahan,
        array $ukuran,
        int $stok,
        float $rating,
    ): array {
        $isTersedia = $stok > 0 && $rating > 0;

        return [
            'id'          => $id,
            'slug'        => $slug,
            'nama'        => $nama,
            'brand'       => $brand,
            'kategori'    => $kategori,
            'warna'       => $warna,
            'harga'       => $harga,
            'harga_coret' => $hargaCoret,
            'gambar'      => $gambar,
            'deskripsi'   => $deskripsi,
            'bahan'       => $bahan,
            'ukuran'      => $ukuran,
            'stok'        => $stok,
            'rating'      => $rating,
            'is_tersedia' => $isTersedia,
        ];
    }

    /**
     * Hitung persentase diskon jika ada harga coret.
     */
    public static function persenDiskon(array $produk): int
    {
        $hargaCoret = $produk['harga_coret'] ?? null;

        if ($hargaCoret === null || $hargaCoret <= $produk['harga']) {
            return 0;
        }

        return (int) round((($hargaCoret - $produk['harga']) / $hargaCoret) * 100);
    }
}

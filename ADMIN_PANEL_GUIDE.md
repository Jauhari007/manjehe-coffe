# 📋 Admin Panel Guide - Manjehe Coffee

## 🔐 Admin Login
**URL:** http://localhost:8000/admin/login

**Credentials:**
- Email: `admin@coffeemanjehe.com`
- Password: `admin123`

## 🏠 Dashboard Features
Setelah login, Anda akan diarahkan ke dashboard yang menampilkan:

### 📊 Statistics Cards
- **Total Products:** Jumlah total produk kopi
- **Categories:** Jumlah kategori yang berbeda
- **Featured Products:** Produk yang ditandai sebagai unggulan
- **Recent Additions:** Produk yang baru ditambahkan minggu ini

### 📈 Recent Products Table
Menampilkan 5 produk terbaru dengan informasi:
- Nama produk dengan icon
- Kategori
- Harga (format Rupiah)
- Status (Active/Inactive)
- Aksi (View, Edit, Delete)

## ☕ Product Management

### 📋 Product List (/admin/products)
**Features:**
- **Search:** Cari produk berdasarkan nama
- **Filter:** Filter berdasarkan kategori, status, dan harga
- **Sorting:** Urutkan berdasarkan nama, kategori, harga, atau tanggal
- **Pagination:** Navigasi halaman dengan 10 produk per halaman
- **Actions:** View, Edit, Delete untuk setiap produk

### ➕ Add New Product (/admin/products/create)
**Form Fields:**
- **Name:** Nama produk (required)
- **Category:** Pilih kategori dari dropdown
- **Price:** Harga dalam Rupiah (numeric)
- **Description:** Deskripsi produk (rich textarea)
- **Features:** Fitur utama (dynamic add/remove)
- **Icon:** Icon picker dengan preview
- **Image URL:** URL gambar produk
- **Status:** Active/Inactive toggle
- **Is Featured:** Tandai sebagai produk unggulan

**Interactive Features:**
- **Real-time Preview:** Lihat preview produk saat mengisi form
- **Icon Selector:** Pilih icon dari koleksi Font Awesome
- **Dynamic Features:** Tambah/hapus fitur dengan tombol
- **Form Validation:** Validasi client-side dan server-side

### ✏️ Edit Product (/admin/products/{id}/edit)
- Form yang sama dengan Create
- Data produk sudah terisi
- Preview menampilkan data saat ini

### 👁️ View Product (/admin/products/{id})
- Detail lengkap produk
- Layout card yang menarik
- Informasi metadata (created/updated)

## 🎨 Design Features

### 🎯 Responsive Design
- Mobile-friendly layout
- Bootstrap 5 framework
- Adaptive navigation

### 🎨 Modern UI Elements
- Gradient backgrounds
- Shadow effects
- Hover animations
- Icon integration (Font Awesome 6)

### 🎭 Interactive Components
- Smooth transitions
- Loading states
- Form animations
- Real-time feedback

## 🛠️ Technical Details

### 🔒 Security Features
- Admin guard authentication
- CSRF protection
- Route middleware protection
- Session management

### 📱 Browser Compatibility
- Chrome (recommended)
- Firefox
- Safari
- Edge

### ⚡ Performance
- Optimized queries
- Cached views
- Compressed assets
- Lazy loading

## 🚀 Getting Started

1. **Start Server:**
   ```bash
   cd c:\xampp\htdocs\manjehe-coffe
   php artisan serve
   ```

2. **Access Admin Panel:**
   - Buka browser ke http://localhost:8000/admin/login
   - Login dengan credentials di atas

3. **Explore Features:**
   - Dashboard → Lihat statistik
   - Products → Kelola produk kopi
   - Create → Tambah produk baru

## 🔧 Troubleshooting

### Login Issues
- Pastikan server Laravel berjalan
- Clear cache: `php artisan cache:clear`
- Check database connection

### Display Issues
- Clear browser cache
- Disable browser extensions
- Check console for JavaScript errors

### Database Issues
- Run migrations: `php artisan migrate`
- Seed data: `php artisan db:seed`

## 📞 Support
Jika mengalami masalah, periksa:
1. Laravel logs: `storage/logs/laravel.log`
2. Browser console untuk JavaScript errors
3. Network tab untuk API responses

---

**Admin Panel Version:** 1.0
**Laravel Version:** 11.x
**Last Updated:** $(Get-Date -Format "yyyy-MM-dd")

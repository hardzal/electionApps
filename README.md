# ElectionApps

## Spesifications

- [x] Login + Logout
- [ ] CRUD Kandidat
- [ ] CRUD Pemilih
- [ ] CRUD Pemilihan
- [ ] Report Pemilihan
- [ ] Statistik Pemilihan
- [ ] Notification Pemilihan
- [ ] Logs Activity

---

## Flow

User mempunyai akun?
 jika iya maka login
 jika tidak bisa mendaftar melalui form menunggu persetujuan admin

Sesudah login maka user bisa melihat daftar pemilihan
sesuai privilage user, user akan memilih dipemilihan yang sesuai akses dia, untuk pemilihan yang lain tidak sesuai pemilihannya maka user hanya bisa melihat status pemilihannya.

jika sudah memilih pemilihan maka user wajib memilih dalam jangka waktu tertentu, jika tidak maka hak user memilih akan menghilang karena pemilihan akan berakhir dalam jangka waktu tertentu.

jika sudah memilih maka user tidak bisa mengganti opsi pemilihannya, dan tidak bisa melakukan pemilihan lagi dipemilihan yang sama.

jika pemilihan sudah berakhir maka user akan diberi notifikasi bahwa pemilihan telah berakhir, dan bisa melihat hasil keseluruhannya.

---

## Routes
### General
- [ ] /home
- [x] /auth/login
- [x] /auth/signup
- [x] /auth/verify
- [x] /auth/forgotPassword
- [x] /auth/changePassword
### Elections
- [ ] /elections
- [ ] /elections/:id
- [ ] /elections/create
- [ ] /elections/:id/delete
- [ ] /elections/:id/update
- [ ] /elections/:id/stats
- [ ] /elections/:id/report
- [ ] /elections/:id/export
- [ ] /elections/export
### Candidate
- [ ] /candidate
- [ ] /candidate/:id
- [ ] /candidate/:id/create
- [ ] /candidate/:id/delete
- [ ] /candidate/:id/update
- [ ] /candidate/:id/export
- [ ] /candidate/export
### User
- [ ] /users
- [ ] /users/:id
- [ ] /users/create
- [ ] /users/:id/delete
- [ ] /users/:id/update
- [ ] /users/feedback
- [ ] /users/export
- [ ] /users/import
### Admin
- [ ] /admin
- [ ] /admin/settings
- [ ] /admin/feedbacks
### Member
- [ ] /member
- [ ] /member/histories
- [ ] /member/settings
- [ ] /member/profile

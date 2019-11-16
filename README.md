# ElectionApps

## Spesifications

- [x] Login + Logout
- [x] CRUD User
- [ ] CRUD Kandidat
- [ ] CRUD Pemilih
- [ ] CRUD Pemilihan
- [ ] Report Pemilihan
- [ ] Statistik Pemilihan
- [ ] Notification Pemilihan
- [ ] Logs Activity
- [ ] Export
- [ ] Import
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
- [ ] /stats
- [ ] /elections
---
### Authentication
- [x] /auth/login
- [x] /auth/signup
- [x] /auth/verify
- [x] /auth/forgotPassword
- [x] /auth/changePassword
---
### Elections
- [ ] /admin/elections
- [ ] /admin/election/create
- [ ] /admin/election/:id/details
- [ ] /admin/election/:id/delete
- [ ] /admin/election/:id/update
- [ ] /admin/election/:id/stats
- [ ] /admin/election/:id/report
- [ ] /admin/election/:id/export
- [ ] /elections/export
- [ ] /elections/histories
---
### Candidat
- [ ] /admin/candidates
- [ ] /admin/candidate/create
- [ ] /admin/candidate/:id/delete
- [ ] /admin/candidate/:id/edit
- [ ] /admin/candidate/:id/export
- [ ] /admin/candidates/export
---
### User
- [x] /users
- [ ] /user/:id/details
- [x] /user/create
- [x] /user/:id/delete
- [x] /user/:id/edit
- [ ] /users/feedback
- [ ] /users/export
- [ ] /users/import
---
### Admin
- [x] /admin
- [ ] /admin/settings
- [ ] /admin/logs
---
### Member
- [ ] /member
- [ ] /member/settings
- [ ] /member/profile
- [ ] /member/logs

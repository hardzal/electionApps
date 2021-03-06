# ElectionApps

## Spesifications

- [x] Login + Logout
- [x] CRUD User
- [x] CRUD Kandidat
- [x] CRUD Pemilih
- [x] CRUD Pemilihan
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
- [ ] /elections
- [ ] /candidates
---
### Authentication
- [x] /auth/login
- [x] /auth/signup
- [x] /auth/verify
- [x] /auth/forgotPassword
- [x] /auth/changePassword
---
### Elections
- [x] /admin/elections
- [x] /admin/election/create
- [x] /admin/election/:id/details
- [x] /admin/election/:id/delete
- [x] /admin/election/:id/update
- [ ] /admin/election/:id/stats
- [ ] /admin/election/:id/report
- [ ] /admin/election/:id/export
- [ ] /elections/export
- [ ] /elections/histories
---
### Candidat
- [x] /admin/candidates
- [ ] /admin/candidate/:id/details
- [x] /admin/candidate/create
- [x] /admin/candidate/:id/delete
- [x] /admin/candidate/:id/edit
- [ ] /admin/candidate/:id/export
- [ ] /admin/candidates/export
---
### User
- [x] /admin/users
- [x] /admin/user/:id/details
- [x] /admin/user/create
- [x] /admin/user/:id/delete
- [x] /admin/user/:id/edit
- [ ] /admin/users/feedback
- [ ] /admin/users/export
- [ ] /admin/users/import
---
### Admin
- [x] /admin
- [ ] /admin/settings
- [ ] /admin/user/logs
- [ ] /admin/logs
---
### Member
- [ ] /member
- [ ] /member/settings
- [ ] /member/profile
- [ ] /member/logs
---- 
## Database Migration

- Run Migration

	``
	$ php index.php migration migrate
	``

- Create Migration

	``
	$ php index.php migration create your_migration_name
	``
---
## User Login

- Administrator
	``
		NIM: 123000000
		Password: password
	``
- Candidate
	``
		NIM: 
		Password: 
	``
- Member
	``
		NIM: 
		Password:
	``

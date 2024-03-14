## vendingMachine

Project Vending Machine yang terintegrasi dengan IOT

## instalation

cara instalasi

### clone repositori git

```bash
git clone https://github.com/amiminn/vending-machine.git
```

```bash
cd vending-machine
```

### install dependensi composer dan npm

```bash
composer install
```

```bash
npm install
```

### jalankan server

```bash
npm run dev
```

```bash
php artisan serve
```

## Struktur Database

Produk

<table>
    <tbody>
        <tr>
            <td>
                id
            </td>
            <td>
                nama
            </td>
            <td>
                harga
            </td>
            <td>
                gambar
            </td>
            <td>
                stok
            </td>
            <td>
                status
            </td>
        </tr>
    </tbody>
</table>

Terjual

<table>
    <tbody>
        <tr>
            <td>
                id
            </td >
            <td>
                produk_id
            </td >
            <td>
                data_produk(json)
            </td >
            <td>
                qr
            </td >
            <td>
                status
            </td >
            <td>
                total
            </td >
        </tr>
    </tbody>
</table>

Simulator

<table>
    <tbody>
        <tr>
            <td>
                id
            </td>
            <td>
                nama
            </td>
            <td>
                avatar
            </td>
            <td>
                saldo
            </td>
        </tr>
    </tbody>
</table>

Riwayat

<table>
    <tbody>
        <tr>
            <td>
                id
            </td>
            <td>
                simulator_id
            </td>
            <td>
                terjual_id
            </td>
        </tr>
    </tbody>
</table>

User

<table>
    <tbody>
        <tr>
            <td>
                id
            </td>
            <td>
                username
            </td>
            <td>
                avatar
            </td>
        </tr>
    </tbody>
</table>

## Contributors

<table>
  <tbody>
    <tr>
      <td align="center" valign="top" width="14.28%">
        <a href="https://amiminn.my.id">
          <img src="https://pbs.twimg.com/profile_images/1710911001187749888/0oWYnaWj_400x400.jpg" width="100px;" alt="Abdul Malik"/>
          <br />
          <sub><b>Tholabul Amin</b></sub>
        </a>
      </td>
    </tr>
  </tbody>
</table>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tab</title>
    <style>
        .tab {
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }

        .tab button {
            margin: 0 10px;
            padding: 10px 20px;
            font-size: 14px;
            border: 1px solid black;
            border-radius: 8px;
            background: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .tab button.active {
            background-color: black;
            color: white;
        }

        .tab button:focus {
            outline: none;  /* Hapus outline default saat tab dipilih */
        }
    </style>
</head>
<body>

    <div class="tab">
        <!-- Menambahkan kelas 'active' secara default pada tab pertama -->
        <button class="active" onclick="setActiveTab(event, 'consultationHistory')">Consultation History</button>
        <a href="mydevice.php"><button onclick="setActiveTab(event, 'myDevice')">My Device</button></a>
        <button onclick="setActiveTab(event, 'profile')">Profile</button>
    </div>

    <script>
        // Fungsi untuk mengubah status tab yang aktif
        function setActiveTab(event, tabName) {
            // Mengambil semua tombol tab
            const tabs = document.querySelectorAll('.tab button');

            // Menghapus kelas 'active' dari semua tab
            tabs.forEach(tab => {
                tab.classList.remove('active');
            });

            // Menambahkan kelas 'active' pada tab yang diklik
            event.target.classList.add('active');
            
            // Optional: Anda bisa menambahkan logika untuk menampilkan konten terkait tab yang dipilih
            console.log(tabName + " tab is selected");
        }
    </script>

</body>
</html>

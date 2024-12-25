import mysql.connector # type: ignore
from datetime import datetime
import random
import time

# Fungsi untuk membuat koneksi ke database
def create_connection():
    return mysql.connector.connect(
        host="localhost",
        user="root",  # Ganti dengan username database Anda
        password="",  # Ganti dengan password database Anda
        database="hidroponik"  # Ganti dengan nama database Anda
    )

# Fungsi untuk menyimpan data ke database
def save_to_database(waktu, ph, suhu_air, kelembapan, tds):
    conn = create_connection()
    cursor = conn.cursor()
    cursor.execute('''
        INSERT INTO monitoring (waktu, ph, suhu_air, kelembapan, tds)
        VALUES (%s, %s, %s, %s, %s)
    ''', (waktu, ph, suhu_air, kelembapan, tds))
    conn.commit()
    conn.close()

# Fungsi untuk membaca data dari sensor (simulasi dalam hal ini)
def read_sensor_data():
    waktu = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
    ph = round(random.uniform(5.5, 7.5), 2)  # Simulasi nilai pH
    suhu_air = round(random.uniform(18.0, 30.0), 2)  # Simulasi suhu air (°C)
    kelembapan = round(random.uniform(50.0, 90.0), 2)  # Simulasi kelembapan (%)
    tds = round(random.uniform(500, 1500), 2)  # Simulasi nilai TDS (ppm)
    return waktu, ph, suhu_air, kelembapan, tds

# Fungsi utama untuk menjalankan monitoring
def main():
    print("Monitoring nutrisi hidroponik dimulai...")
    try:
        while True:
            # Membaca data sensor
            waktu, ph, suhu_air, kelembapan, tds = read_sensor_data()

            # Menampilkan data ke layar
            print(f"Waktu: {waktu}, pH: {ph}, Suhu Air: {suhu_air}°C, Kelembapan: {kelembapan}%, TDS: {tds} ppm")

            # Menyimpan data ke database
            save_to_database(waktu, ph, suhu_air, kelembapan, tds)

            # Interval waktu pengambilan data (misalnya setiap 5 detik)
            time.sleep(5)
    except KeyboardInterrupt:
        print("Monitoring dihentikan.")

if __name__ == '__main__':
    main()
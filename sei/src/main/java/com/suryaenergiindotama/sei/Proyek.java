package com.suryaenergiindotama.sei;

import jakarta.persistence.*;

import java.sql.Timestamp;
import java.time.LocalDate;
import org.hibernate.annotations.CreationTimestamp;

import java.util.ArrayList;
import java.util.List;

@Entity
public class Proyek {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private int id;
    private String namaProyek;
    private String client;
    private LocalDate tglMulai;
    private LocalDate tglSelesai;

    private String pimpinanProyek;
    private String keterangan;

    @CreationTimestamp
    private Timestamp createdAt;

    @ManyToMany(fetch = FetchType.LAZY, cascade = CascadeType.ALL)
    @JoinTable(
            name = "proyek_lokasi",
            joinColumns = @JoinColumn(name = "proyek_id"),
            inverseJoinColumns = @JoinColumn(name = "lokasi_id")
    )
    private List<Lokasi> lokasi = new ArrayList<>();

    public int getId() {
        return id;
    }
    public String getClient() {
        return client;
    }
    public String getKeterangan() {
        return keterangan;
    }
    public String getPimpinanProyek() {
        return pimpinanProyek;
    }
    public String getNamaProyek() {
        return namaProyek;
    }
    public LocalDate getTglMulai() {
        return tglMulai;
    }
    public LocalDate getTglSelesai() {
        return tglSelesai;
    }
    public Timestamp getCreatedAt() {
        return createdAt;
    }
    public List<Lokasi> getLokasi() {
        return lokasi;
    }

    public void setClient(String client) {
        this.client = client;
    }
    public void setKeterangan(String keterangan) {
        this.keterangan = keterangan;
    }
    public void setNamaProyek(String namaProyek) {
        this.namaProyek = namaProyek;
    }
    public void setPimpinanProyek(String pimpinanProyek) {
        this.pimpinanProyek = pimpinanProyek;
    }
    public void setTglMulai(LocalDate tglMulai) {
        this.tglMulai = tglMulai;
    }
    public void setTglSelesai(LocalDate tglSelesai) {
        this.tglSelesai = tglSelesai;
    }
    public void setCreatedAt(Timestamp createdAt) {
        this.createdAt = createdAt;
    }
    public void setLokasi(List<Lokasi> Lokasi) {
        this.lokasi = lokasi;
    }
}


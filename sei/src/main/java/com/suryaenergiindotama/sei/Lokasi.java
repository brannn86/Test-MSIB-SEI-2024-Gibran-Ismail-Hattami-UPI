package com.suryaenergiindotama.sei;

import jakarta.persistence.*;

import org.hibernate.annotations.CreationTimestamp;
import java.sql.Timestamp;
import java.util.List;

@Entity
public class Lokasi {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO,
    generator = "native")
    private int id;
    private String namaLokasi;
    private String negara;
    private String kota;
    private String provinsi;

    @CreationTimestamp
    private Timestamp createdAt;

    @ManyToMany(mappedBy = "lokasi")
    private List<Proyek> proyek;

    //constructor
    public Lokasi() {
    }
    public int getId() {
        return id;
    }
    public String getKota() {
        return kota;
    }
    public String getNamaLokasi() {
        return namaLokasi;
    }
    public String getNegara() {
        return negara;
    }
    public String getProvinsi() {
        return provinsi;
    }
    public void setKota(String kota) {
        this.kota = kota;
    }
    public void setNamaLokasi(String namaLokasi) {
        this.namaLokasi = namaLokasi;
    }
    public void setNegara(String negara) {
        this.negara = negara;
    }
    public void setProvinsi(String provinsi) {
        this.provinsi = provinsi;
    }
    public Timestamp getCreatedAt() {
        return createdAt;
    }
    public void setCreatedAt(Timestamp createdAt) {
        this.createdAt = createdAt;
    }
}

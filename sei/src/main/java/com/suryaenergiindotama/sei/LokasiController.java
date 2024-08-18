package com.suryaenergiindotama.sei;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.List;
import java.util.Map;
import java.util.HashMap;

@RestController
@RequestMapping("/lokasi")
public class LokasiController {

    @Autowired
    private LokasiRepository lokasiRepository;

    @PostMapping
    public Lokasi createLokasi(@RequestBody Lokasi lokasi) {
        return lokasiRepository.save(lokasi);
    }

    @GetMapping
    public List<Lokasi> getAllLokasi() {
        return lokasiRepository.findAll();
    }

    @GetMapping("/{id}")
    public ResponseEntity<Lokasi> getLokasiById(@PathVariable Long id) {
        Lokasi lokasi = lokasiRepository.findById(id.intValue())
                .orElseThrow(() -> new ResourceNotFoundException("Lokasi not found, id = " + id));
        return ResponseEntity.ok(lokasi);
    }

    @PutMapping("/{id}")
    public ResponseEntity<Lokasi> updateLokasi(@PathVariable Long id, @RequestBody Lokasi lokasiDetails) {
    Lokasi lokasi = lokasiRepository.findById(id.intValue())
            .orElseThrow(() -> new ResourceNotFoundException("Lokasi not found, id = " + id));
        lokasi.setNamaLokasi(lokasiDetails.getNamaLokasi());
        lokasi.setNegara(lokasiDetails.getNegara());
        lokasi.setKota(lokasiDetails.getKota());
        lokasi.setProvinsi(lokasiDetails.getProvinsi());

        final Lokasi updatedLokasi = lokasiRepository.save(lokasi);
        return ResponseEntity.ok(updatedLokasi);
    }

    @DeleteMapping("/{id}")
    public Map<String, Boolean> deleteLokasi(@PathVariable Long id) {
        Lokasi lokasi = lokasiRepository.findById(id.intValue())
                .orElseThrow(() -> new ResourceNotFoundException("Lokasi not found, id = " + id));

        lokasiRepository.delete(lokasi);
        Map<String, Boolean> response = new HashMap<>();
        response.put("deleted", Boolean.TRUE);
        return response;
    }
}

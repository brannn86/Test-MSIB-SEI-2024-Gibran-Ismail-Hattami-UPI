package com.suryaenergiindotama.sei;

import java.util.List;
import java.util.Map;
import java.util.HashMap;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

@RestController
@RequestMapping("/proyek")
public class ProyekController {
    private static final Logger logger = LoggerFactory.getLogger(ProyekController.class);

    @Autowired
    private ProyekRepository proyekRepository;

    @Autowired
    private LokasiRepository lokasiRepository;

    @PostMapping
    public Proyek createProyek(@RequestBody Proyek proyek) {
        List<Lokasi> lokasiList = proyek.getLokasi();
        logger.info("log");
        for (Lokasi lokasi : lokasiList) {
            lokasiRepository.findById(lokasi.getId())
                    .orElseThrow(() -> new ResourceNotFoundException("Lokasi not found, ID = " + lokasi.getId()));
        }
        return proyekRepository.save(proyek);
    }
    @GetMapping
    public List<Proyek> getAllProyek() {
        return proyekRepository.findAll();
    }

    @GetMapping("/{id}")
    public ResponseEntity<Proyek> getProyekById(@PathVariable Long id) {
        Proyek proyek = proyekRepository.findById(id.intValue())
                .orElseThrow(() -> new ResourceNotFoundException("Proyek not found, id = " + id));
        return ResponseEntity.ok(proyek);
    }

    @PutMapping("/{id}")
    public ResponseEntity<Proyek> updateProyek(@PathVariable Long id, @RequestBody Proyek proyekDetails) {
        Proyek proyek = proyekRepository.findById(id.intValue())
                .orElseThrow(() -> new ResourceNotFoundException("Proyek not found, id = " + id));
        proyek.setClient(proyekDetails.getClient());
        proyek.setKeterangan(proyekDetails.getKeterangan());
        proyek.setNamaProyek(proyekDetails.getNamaProyek());
        proyek.setPimpinanProyek(proyekDetails.getPimpinanProyek());
        proyek.setTglMulai(proyekDetails.getTglMulai());
        proyek.setTglSelesai(proyekDetails.getTglSelesai());
        proyek.setLokasi(proyekDetails.getLokasi());

        final Proyek updatedProyek = proyekRepository.save(proyek);
        return ResponseEntity.ok(updatedProyek);
    }

    @DeleteMapping("/{id}")
    public Map<String, Boolean> deleteProyek(@PathVariable Long id) {
        Proyek proyek = proyekRepository.findById(id.intValue())
                .orElseThrow(() -> new ResourceNotFoundException("Proyek not found, id = " + id));

        proyekRepository.delete(proyek);
        Map<String, Boolean> response = new HashMap<>();
        response.put("deleted", Boolean.TRUE);
        return response;
    }
}

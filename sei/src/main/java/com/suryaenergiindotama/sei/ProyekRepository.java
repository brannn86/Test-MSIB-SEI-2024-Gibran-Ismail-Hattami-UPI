package com.suryaenergiindotama.sei;

import com.suryaenergiindotama.sei.Proyek;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface ProyekRepository extends JpaRepository<Proyek, Integer>{
}

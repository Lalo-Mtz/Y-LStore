ALTER TABLE `store`.`domicilio` 
ADD INDEX `fk_idu_idx` (`idu` ASC) VISIBLE;
;
ALTER TABLE `store`.`domicilio` 
ADD CONSTRAINT `fk_idu_dom`
  FOREIGN KEY (`idu`)
  REFERENCES `store`.`usuario` (`idu`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;



ALTER TABLE `store`.`carrito` 
ADD INDEX `fk_idu_car_idx` (`idu` ASC) VISIBLE,
ADD INDEX `fk_idp_car_idx` (`idp` ASC) VISIBLE;
;
ALTER TABLE `store`.`carrito` 
ADD CONSTRAINT `fk_idu_car`
  FOREIGN KEY (`idu`)
  REFERENCES `store`.`usuario` (`idu`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_idp_car`
  FOREIGN KEY (`idp`)
  REFERENCES `store`.`producto` (`idp`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
  
  
  
  
  ALTER TABLE `store`.`compra` 
ADD INDEX `fk_idu_cmp_idx` (`idu` ASC) VISIBLE;
;
ALTER TABLE `store`.`compra` 
ADD CONSTRAINT `fk_idu_cmp`
  FOREIGN KEY (`idu`)
  REFERENCES `store`.`usuario` (`idu`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
  
  
  
  
  ALTER TABLE `store`.`contiene` 
ADD INDEX `fk_idc_con_idx` (`idc` ASC) VISIBLE,
ADD INDEX `fk_idp_con_idx` (`idp` ASC) VISIBLE;
;
ALTER TABLE `store`.`contiene` 
ADD CONSTRAINT `fk_idc_con`
  FOREIGN KEY (`idc`)
  REFERENCES `store`.`compra` (`idc`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_idp_con`
  FOREIGN KEY (`idp`)
  REFERENCES `store`.`producto` (`idp`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
  
  
  ALTER TABLE `store`.`mensaje` 
ADD INDEX `fk_idu_men_idx` (`idu` ASC) VISIBLE;
;
ALTER TABLE `store`.`mensaje` 
ADD CONSTRAINT `fk_idu_men`
  FOREIGN KEY (`idu`)
  REFERENCES `store`.`usuario` (`idu`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


ALTER TABLE `store`.`comenta` 
ADD INDEX `fk_idu_comenta_idx` (`idu` ASC) VISIBLE,
ADD INDEX `fk_idp_comenta_idx` (`idp` ASC) VISIBLE;
;
ALTER TABLE `store`.`comenta` 
ADD CONSTRAINT `fk_idu_comenta`
  FOREIGN KEY (`idu`)
  REFERENCES `store`.`usuario` (`idu`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_idp_comenta`
  FOREIGN KEY (`idp`)
  REFERENCES `store`.`producto` (`idp`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


ALTER TABLE `store`.`producto` 
ADD INDEX `fk_idca_pro_idx` (`idca` ASC) VISIBLE;
;
ALTER TABLE `store`.`producto` 
ADD CONSTRAINT `fk_idca_pro`
  FOREIGN KEY (`idca`)
  REFERENCES `store`.`categoria` (`idca`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


ALTER TABLE `store`.`califica` 
ADD INDEX `fk_idu_cali_idx` (`idu` ASC) VISIBLE,
ADD INDEX `fk_idp_cali_idx` (`idp` ASC) VISIBLE;
;
ALTER TABLE `store`.`califica` 
ADD CONSTRAINT `fk_idu_cali`
  FOREIGN KEY (`idu`)
  REFERENCES `store`.`usuario` (`idu`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_idp_cali`
  FOREIGN KEY (`idp`)
  REFERENCES `store`.`producto` (`idp`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;



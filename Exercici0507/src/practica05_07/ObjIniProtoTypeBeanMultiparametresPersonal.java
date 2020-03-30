package practica05_07;

import java.time.LocalDate;

import org.springframework.context.annotation.Scope;
import org.springframework.stereotype.Component;

@Component
@Scope("prototype")
public class ObjIniProtoTypeBeanMultiparametresPersonal {
	String dni;
	String nom;
	String contrasenya;
	LocalDate dataCreacio;
	int departament;
	
	public ObjIniProtoTypeBeanMultiparametresPersonal(String dni, String nom, String contrasenya, LocalDate dataCreacio, int departament) {
		super();
		this.dni = dni;
		this.nom = nom;
		this.contrasenya = contrasenya;
		this.dataCreacio = dataCreacio;
		this.departament = departament;
	}
}
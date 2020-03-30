package practica05_07;

import java.util.ArrayList;

import org.springframework.context.annotation.Scope;
import org.springframework.stereotype.Component;

@Component
@Scope("prototype")
public class Departament {

	int id;
	String nom;
	String email;
	Organitzacio organitzacio;
	Personal capDeDepartament;
	ArrayList<Personal> llistaPersonal;

	public Departament(ObjIniProtoTypeBeanMultiparametresDepartament obj) {
		this.id = obj.id;
		this.nom = obj.nom;
	}

	public int getId() {
		return id;
	}

	public void setID(int id) {
		this.id = id;
	}

	public String getNom() {
		return nom;
	}

	public void setNom(String nom) {
		this.nom = nom;
	}

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public Organitzacio getOrganitzacio() {
		return organitzacio;
	}

	public void setOrganitzacio(Organitzacio organitzacio) {
		this.organitzacio = organitzacio;
	}

	public Personal getCapDeDepartament() {
		return capDeDepartament;
	}

	public void setCapDeDepartament(Personal capDeDepartament) {
		this.capDeDepartament = capDeDepartament;
	}

	public ArrayList<Personal> getLlistaPersonal() {
		return llistaPersonal;
	}

	public void setLlistaPersonal(ArrayList<Personal> llistaPersonal) {
		this.llistaPersonal = llistaPersonal;
	}

}

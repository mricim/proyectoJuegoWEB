package practica05_07;

import java.time.LocalDate;

import javax.validation.constraints.Min;
import javax.validation.constraints.NotBlank;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.PastOrPresent;
import javax.validation.constraints.Pattern;
import javax.validation.constraints.Size;

import org.springframework.context.annotation.Scope;
import org.springframework.stereotype.Component;

import Validacions.validacioDni;

@Component
@Scope("prototype")
public class Personal {

	@validacioDni
	String dni;
	String nom;
	@NotNull(message = "No pot estar buit")
	@Size(min = 2, max = 100, message = "Longitud mínima de 2 caràcters")
	@Pattern(regexp = "[a-zA-ZÀ-ÿ\\u00f1\\u00d1]{2,}", message = "Cognom incorrecte")
	String cognom;
	@NotNull(message = "No pot estar buit")
	@Pattern(regexp="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]+$", message= "Email incorrecte")
	String email;
	String login;
	@NotNull(message = "No pot estar buit")
	@NotBlank
	@Size(min = 7, message = "Longitud mínima de 7 caràcters")
	String contrasenya;
	int departament;
	String coneixments;
	String ciutatNaixement;
	String idiomes;
	@Min(value = 17, message = "Edat mínima: 17 anys")
	int edat;
	String telefon;
	@PastOrPresent
	LocalDate dataCreacio;

	public Personal() {

	}

	public Personal(ObjIniProtoTypeBeanMultiparametresPersonal obj) {
		this.dni = obj.dni;
		this.nom = obj.nom;
		this.contrasenya = obj.contrasenya;
		this.dataCreacio = obj.dataCreacio;
		this.departament = obj.departament;
	}

	public Personal(String dni, String nom, String contrasenya, LocalDate dataCreacio, int departament) {
		this.dni = dni;
		this.nom = nom;
		this.contrasenya = contrasenya;
		this.dataCreacio = dataCreacio;
		this.departament = departament;
	}

	public String getDni() {
		return dni;
	}

	public void setDni(String dni) {
		this.dni = dni;
	}

	public String getNom() {
		return nom;
	}

	public void setNom(String nom) {
		this.nom = nom;
	}

	public String getCognom() {
		return cognom;
	}

	public void setCognom(String cognom) {
		this.cognom = cognom;
	}

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public String getLogin() {
		return login;
	}

	public void setLogin(String login) {
		this.login = login;
	}

	public String getContrasenya() {
		return contrasenya;
	}

	public void setContrasenya(String contrasenya) {
		this.contrasenya = contrasenya;
	}

	public int getDepartament() {
		return departament;
	}

	public void setDepartament(int departament) {
		this.departament = departament;
	}

	public String getConeixments() {
		return coneixments;
	}

	public void setConeixments(String coneixments) {
		this.coneixments = coneixments;
	}

	public String getCiutatNaixement() {
		return ciutatNaixement;
	}

	public void setCiutatNaixement(String ciutatNaixement) {
		this.ciutatNaixement = ciutatNaixement;
	}

	public String getIdiomes() {
		return idiomes;
	}

	public void setIdiomes(String idiomes) {
		this.idiomes = idiomes;
	}

	public int getEdat() {
		return edat;
	}

	public void setEdat(int edat) {
		this.edat = edat;
	}

	public String getTelefon() {
		return telefon;
	}

	public void setTelefon(String telefon) {
		this.telefon = telefon;
	}

	public LocalDate getDataCreacio() {
		return dataCreacio;
	}

	public void setDataCreacio(LocalDate dataCreacio) {
		this.dataCreacio = dataCreacio;
	}

}

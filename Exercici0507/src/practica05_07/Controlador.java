package practica05_07;

import java.time.LocalDate;
import java.util.ArrayList;
import java.util.Iterator;

import javax.validation.Valid;

import org.springframework.beans.propertyeditors.StringTrimmerEditor;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.WebDataBinder;
import org.springframework.web.bind.annotation.InitBinder;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class Controlador {

	DadesInicials dadesInicials = new DadesInicials();
	ArrayList<Personal> llistatPersonal;
	ArrayList<Departament> llistatDepartament;

	@RequestMapping("/")
	public String inici() {
		
		//S'inicialitzen les dades
		dadesInicials.inicialitzarDades();
		//Es guarden les dades inicialitzades a les llistes corresponents
		llistatPersonal = dadesInicials.getUsuarisInicials();
		llistatDepartament = dadesInicials.getDepartamentsInicials();

		return "inici";
	}

	@RequestMapping("/login")
	public String login(Model model) {
		model.addAttribute("error", "");
		return "login";
	}

	@RequestMapping("/formulariLogin")
	public String formulariLogin(Model model, @RequestParam(value = "dni", required = false) String dni,
			@RequestParam(value = "contrasenya", required = false) String contrasenya) {

		String error = "";

		//Recorre la llista del personal
		Iterator<Personal> i = llistatPersonal.iterator();
		while (i.hasNext()) {
			Personal p = (Personal) i.next();
			String dniTmp = p.getDni();
			//Si el DNI introduit coincideix amb un de la llista es comprova que la contrasenya sigui la correcta
			if (dniTmp.equals(dni)) {
				if (p.getContrasenya().equals(contrasenya)) {
					//En cas que la contrasenya sigue correcta s'afegeix al modal la llista de departaments,
					//l'usuari i el dni
					model.addAttribute("departaments", llistatDepartament);
					model.addAttribute("usuari", p);
					model.addAttribute("dni",p.getDni());
					return "modificarDadesUsuari";
				} else {
					//S'afegeix a la variable 'error' que la contrasenya és incorrecta
					error = "Contrasenya incorrecta";
					break;
				}
			} else {
				//S'afegeix a la variable 'error' que el DNI introduit no existeix a la llista de personal
				error = "ERROR, no existeix aquest DNI.";
			}
		}

		//Afegeix al model el missatge d'error
		model.addAttribute("error", error);
		return "login"; // Nom de la vista que volem
	}

	@RequestMapping("/donarAltaUsuari")
	public String donarAltaUsuari(Model model) {
		model.addAttribute("error", "");
		return "donarAltaUsuari"; // Nom de la vista que volem
	}

	@RequestMapping("/formulariDonarAltaUsuari")
	public String formulariDonarAltaUsuari(Model model, @RequestParam(value = "dni", required = false) String dni,
			@RequestParam(value = "nom", required = false) String nom,
			@RequestParam(value = "contrasenya", required = false) String contrasenya,
			@RequestParam(value = "departament", required = false) String departament) {

		Personal nouUsuari = new Personal();
		
		String error = "";


			//Recorre la llista de personal per comprovar que no existeix cap usuari amb el DNI introduit
			Iterator<Personal> i = llistatPersonal.iterator();
			while (i.hasNext()) {
				Personal p = (Personal) i.next();
				String dniTmp = p.getDni();
				if (dniTmp.equals(dni)) {
					//És guarda a la variable 'error' que el DNI ja existeix
					error = "El DNI ja existeix";
					//S'afegeix el missatge d'error al model
					model.addAttribute("error", error);
					//Retorna a la vista 'donarAltaUsuari'
					return "donarAltaUsuari";
				}
			}
	
			int dep;
			try {
				dep = Integer.parseInt(departament);
				//Afegeix els valors als camps corresponents
				nouUsuari.setDni(dni);
				nouUsuari.setNom(nom);
				nouUsuari.setContrasenya(contrasenya);
				nouUsuari.setDepartament(dep);
				nouUsuari.setDataCreacio(LocalDate.now());
			} catch (NumberFormatException e) {
				error = "El departament ha de ser numèric (1,2,3)";
				model.addAttribute("error", error);
				return "donarAltaUsuari";
			}
	
			//Afegeix el nou usuari a la llista de personal
			llistatPersonal.add(nouUsuari);
			//S'afegeix l'usuari al model
			model.addAttribute("nouUsuari", nouUsuari);
			//S'afegeix el missatge d'error al model
			model.addAttribute("error", error);
	
			//Una vegada creat el nou usuari torna al login
			return "login"; // Nom de la vista que volem
		}
	

	@RequestMapping("/mostrarDadesUsuari")
	public String mostrarDadesUsuari(Model model,
			@RequestParam(value = "dniOriginal", required = false) String dniOriginal,
			@Valid @ModelAttribute("usuari") Personal usuari, BindingResult resultatValidacio) {

		Boolean dniExistent = false;
		// Actualització de les dades
		Personal p = new Personal();
		if (resultatValidacio.hasErrors()) {
			model.addAttribute("usuari",usuari);
			//Guarda el dni inicial per poder actualitzar després l'usuari correctament
			model.addAttribute("dni",dniOriginal);
			model.addAttribute("departaments",llistatDepartament);
			return "modificarDadesUsuari";
		} else {
			for (Personal pTmp : llistatPersonal) {
				//Quan es trobi l'usuari corresponent, dins la llista del personal, amb el dni inicial s'actualitzaran els camps amb les noves dades
				if (pTmp.getDni().equals(dniOriginal)) {
					p = pTmp;
					for (Personal pTmp2 : llistatPersonal) {
						if (pTmp2.equals(pTmp.getDni())) {
							dniExistent = true;
							return "modificarDadesUsuari";
						}
					}
					
				}
			}
		}
		
		if (!dniExistent) {
			p.setDni(usuari.getDni());
			p.setNom(usuari.getNom());
			p.setCognom(usuari.getCognom());
			p.setContrasenya(usuari.getContrasenya());
			p.setDepartament(usuari.getDepartament());
		}

		//S'afegeix l'usuari al model
		model.addAttribute("usuari", p);

		return "mostrarDadesUsuari"; // Nom de la vista que volem
	}

	@InitBinder
	public void retallarEspaisEnBlanc(WebDataBinder binder) {

		StringTrimmerEditor objRetalladorEspaisEnBlanc = new StringTrimmerEditor(true);

		binder.registerCustomEditor(String.class, objRetalladorEspaisEnBlanc);
	}
}
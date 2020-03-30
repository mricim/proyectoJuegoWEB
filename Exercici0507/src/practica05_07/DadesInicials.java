package practica05_07;

import java.time.LocalDate;
import java.util.ArrayList;

import org.springframework.context.annotation.AnnotationConfigApplicationContext;
import org.springframework.beans.factory.BeanFactory;

public class DadesInicials {

	
	ArrayList<Personal> usuarisInicials;
	ArrayList<Departament> departamentsInicials;
	
	public void inicialitzarDades() {
		setUsuaris();
		setDepartaments();
	}
	
	public void setUsuaris() {
		
		AnnotationConfigApplicationContext context = new AnnotationConfigApplicationContext(aplicacioConfig.class);
		
		ServiceClassPersonal serviceClassPersonal = context.getBean("serviceClassPersonal",ServiceClassPersonal.class);
		
		ArrayList<ObjIniProtoTypeBeanMultiparametresPersonal> someArrayList = new ArrayList();
		
		ObjIniProtoTypeBeanMultiparametresPersonal personal1 = new ObjIniProtoTypeBeanMultiparametresPersonal("47495484R","Mònica", "47495484", LocalDate.now(), 1);
		ObjIniProtoTypeBeanMultiparametresPersonal personal2 = new ObjIniProtoTypeBeanMultiparametresPersonal("47478540P", "Ricard", "47478540", LocalDate.now(), 2);
		ObjIniProtoTypeBeanMultiparametresPersonal personal3 = new ObjIniProtoTypeBeanMultiparametresPersonal("47476344C", "Rafel", "47476344", LocalDate.now(), 3);
		
		someArrayList.add(personal1);
		someArrayList.add(personal2);
		someArrayList.add(personal3);
		
		serviceClassPersonal.demoMethod(someArrayList);
		
		usuarisInicials = (ArrayList<Personal>) serviceClassPersonal.getUsuarisBeans();
	}
	
	private void setDepartaments() {
		
		AnnotationConfigApplicationContext context = new AnnotationConfigApplicationContext(aplicacioConfig.class);
		
		ServiceClassDep serviceClassDep = context.getBean("serviceClassDep",ServiceClassDep.class);
		
		ArrayList<ObjIniProtoTypeBeanMultiparametresDepartament> someArrayList = new ArrayList();
		
		ObjIniProtoTypeBeanMultiparametresDepartament departament1 = new ObjIniProtoTypeBeanMultiparametresDepartament(1, "Fotografia");
		ObjIniProtoTypeBeanMultiparametresDepartament departament2 = new ObjIniProtoTypeBeanMultiparametresDepartament(2, "Producció tècnica");
		ObjIniProtoTypeBeanMultiparametresDepartament departament3 = new ObjIniProtoTypeBeanMultiparametresDepartament(3, "Producció musical");
		
		someArrayList.add(departament1);
		someArrayList.add(departament2);
		someArrayList.add(departament3);
		
		serviceClassDep.demoMethod(someArrayList);
		
		departamentsInicials = (ArrayList<Departament>) serviceClassDep.getDepartamentsBeans();
	}

	public ArrayList<Personal> getUsuarisInicials() {
		return usuarisInicials;
	}

	public ArrayList<Departament> getDepartamentsInicials() {
		return departamentsInicials;
	}
	
	
}


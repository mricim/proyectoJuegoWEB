package practica05_07;

import org.springframework.context.annotation.Scope;
import org.springframework.stereotype.Component;

@Component
@Scope("prototype")
public class ObjIniProtoTypeBeanMultiparametresDepartament {
	int id;
	String nom;
	
	public ObjIniProtoTypeBeanMultiparametresDepartament(int id, String nom) {
		super();
		this.id = id;
		this.nom = nom;
	}
}

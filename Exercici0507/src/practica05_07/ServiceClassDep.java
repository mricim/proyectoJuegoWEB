package practica05_07;

import java.util.ArrayList;
import java.util.List;
import java.util.stream.Collectors;

import org.springframework.beans.factory.BeanFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

@Component
public class ServiceClassDep {
	private final BeanFactory factory;
	private List<Departament> departamentsBeans;

	public ServiceClassDep(BeanFactory factory, List<Departament> departamentsBeans) {
		this.factory = factory;
		this.departamentsBeans = departamentsBeans;
	}

	@Autowired
	public ServiceClassDep(final BeanFactory f) {
		this.factory = f;
	}

	public void demoMethod(ArrayList<ObjIniProtoTypeBeanMultiparametresDepartament> someArrayList) {
		this.departamentsBeans = someArrayList.stream().map(param -> factory.getBean(Departament.class, param))
				.collect(Collectors.toList());
	}

	public List<Departament> getDepartamentsBeans() {
		return departamentsBeans;
	}
}



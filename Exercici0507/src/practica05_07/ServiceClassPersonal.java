package practica05_07;

import java.util.ArrayList;
import java.util.List;
import java.util.stream.Collectors;

import org.springframework.beans.factory.BeanFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

@Component
public class ServiceClassPersonal {
	private final BeanFactory factory;
	private List<Personal> usuarisBeans;

	public ServiceClassPersonal(BeanFactory factory, List<Personal> usuarisBeans) {
		this.factory = factory;
		this.usuarisBeans = usuarisBeans;
	}

	@Autowired
	public ServiceClassPersonal(final BeanFactory f) {
		this.factory = f;
	}

	public void demoMethod(ArrayList<ObjIniProtoTypeBeanMultiparametresPersonal> someArrayList) {
		this.usuarisBeans = someArrayList.stream().map(param -> factory.getBean(Personal.class, param))
				.collect(Collectors.toList());
	}

	public List<Personal> getUsuarisBeans() {
		return usuarisBeans;
	}
	

}


package Validacions;

import java.lang.annotation.ElementType;
import java.lang.annotation.Retention;
import java.lang.annotation.RetentionPolicy;
import java.lang.annotation.Target;

import javax.validation.Constraint;
import javax.validation.Payload;

@Constraint(validatedBy = dni.class)
@Target({ElementType.METHOD, ElementType.FIELD})
@Retention(RetentionPolicy.RUNTIME)
public @interface validacioDni {

//public String value() default "358";
	
	String message() default "El DNI ha d'estar composat de 8 números i 1 lletra (en majúscula)";
	
	Class<?>[] groups() default {};
	
	Class<? extends Payload>[] payload() default {};
}

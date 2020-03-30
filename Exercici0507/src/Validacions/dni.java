package Validacions;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

import javax.validation.ConstraintValidator;
import javax.validation.ConstraintValidatorContext;

public class dni implements ConstraintValidator<validacioDni, String> {

	private Pattern mask = Pattern.compile("[0-9]{8,8}[A-Z]{1}");
	final String lletres = "TRWAGMYFPDXBNJZSQVHLCKE";

	@Override
	public void initialize(validacioDni constraintAnnoDni) {

	}

	@Override
	public boolean isValid(String arg0, ConstraintValidatorContext arg1) {

		Boolean dniCorrecte = false;

		//Comprova que compleix amb la l'expressió correcta (8 números i 1 lletra) 
		final Matcher matcher = mask.matcher(arg0);
		if (!matcher.matches()) {
			dniCorrecte = false;
		} else {
			//Si és compleix comprova que la lletra és la correcta
			String dni = arg0.substring(0, 8);
			String lletra = arg0.substring(8, 9);
			int posLletra = Integer.parseInt(dni) % 23;
			String lletraCorrecta = lletres.substring(posLletra, posLletra + 1);

			if (lletra.equals(lletraCorrecta)) {
				dniCorrecte = true;
			}
		}

		return dniCorrecte;
	}
}

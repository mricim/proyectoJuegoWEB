<%-- <%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%> --%>
	<%@ taglib prefix="form" uri="http://www.springframework.org/tags/form" %>
	<%@ page import="practica05_07.Personal" %>
	<%@ page import="practica05_07.Departament" %>
	<%@page import="java.util.ArrayList"%> 
	<%@ page import="java.time.LocalDate" %>
	<%ArrayList<Departament> departaments = (ArrayList<Departament>) request.getAttribute("departaments"); %>
	<% 
		request.setCharacterEncoding("UTF-8"); 
		Personal usuari = (Personal) request.getAttribute("usuari"); 
		String dniOriginal = (String) request.getAttribute("dni"); 
	%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="${pageContext.request.contextPath}/recursos/css/estil.css"/>
<title>modificarDadesUsuari.jsp</title>
</head>
<body>
	<h3>MODIFICAR DADES DE L'USUARI</h3>

	<table>
		<form:form action="mostrarDadesUsuari" modelAttribute="usuari" method="post">
			<input type="hidden" value="<%=dniOriginal %>" name="dniOriginal"/>
			<tr>
				<td>DNI usuari:</td> 
				<td>
					<form:input type="text" path="dni" value="<%=usuari.getDni() %>"/>
					<form:errors path="dni" style="color:red"/>
				</td>
			</tr>
			<tr>
				<td>Nom usuari:</td> 
				<td><form:input type="text" path="nom" value="<%=usuari.getNom() %>"/></td>
			</tr>
			<tr>
				<td>Cognom:</td>
				<td>
					<form:input type="text" path="cognom" value="<%=usuari.getCognom() %>"/>
					<form:errors path="cognom" style="color:red"/>
				</td>
			</tr>
			<tr>
				<td>Edat:</td>
				<td>
					<form:input type="text" path="edat" value="<%=usuari.getEdat() %>"/>
					<form:errors path="edat" style="color:red"/>
				</td>
			</tr>
			<tr>
				<td>Email:</td>
				<td>
					<form:input type="text" path="email" value="<%=usuari.getEmail() %>"/>
					<form:errors path="email" style="color:red"/>
				</td>
			</tr>
			<tr>
				<td>Contrasenya:</td>
				<td>
					<form:input type="password" path="contrasenya"/>
					<form:errors path="contrasenya" style="color:red"></form:errors>
				</td>
			</tr>
			<tr>
				<td>Departament:</td>
				<td>
					<% for (Departament d : departaments) {
						if (d.getId() == usuari.getDepartament()) {%>
						<form:radiobutton path="departament" value="<%= d.getId() %>" checked="checked" label="<%= d.getNom() %>"/><br>
						<%} else {%>
						<form:radiobutton path="departament" value="<%= d.getId() %>" label="<%= d.getNom() %>"/><br>
						<%}
					}%>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input class="boto" type="submit" value="Modificar"></td>
			</tr>
		</form:form>
	</table>
</body>
</html>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%>
<%@ taglib prefix="form" uri="http://www.springframework.org/tags/form"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
	<%String error = (String) request.getAttribute("error"); %>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="${pageContext.request.contextPath}/recursos/css/estil.css"/>
<title>login.jsp</title>
</head>
<body>
	<h3>LOGIN</h3>
	<% if (!error.equals("")) { %>
		<p class="error">${error}</p>
	<%} %>
	<table>
		<form action="formulariLogin" method="post">
			<tr>
				<td>DNI usuari:</td>
				<td><input type="text" name="dni"></td>
			</tr>
			<tr>
				<td>Contrasenya:</td>
				<td><input type="password" name="contrasenya"></td>
			<tr>
				<td colspan="2"><input class="boto" type="submit" value="Login"/></td>
		</form>
	</table>
	<br>
	<br>
	<div id="divDonarAlta" >
		<a href="donarAltaUsuari">Donar d'alta nou personal</a>
	</div>
</body>
</html>
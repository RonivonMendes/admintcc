import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;

import com.gargoylesoftware.htmlunit.javascript.host.Element;

public class Config {
	protected static WebDriver driver;
	
	//LOGIN
	protected static String email ="adelinopessanha@gmail.com";
	protected static String senha ="batata";
	
	//CADASTRO ALUNO
	protected static String nomeAluno = "Adelino Costa Santos Pessanha";
	protected static String rgAluno = "MG-19.134.345";
	protected static String orgaoAluno = "UFG";
	protected static String cpfAluno = "123456789";
	protected static String cursoAluno = "Análise e Desenvolvimento de Sistemas";
	
	protected static By btnAluno =  By.id("f1");
	protected static By txtRg = By.name("rg");
	protected static By txtNome =  By.name("nome");
	protected static By txtOrgao = By.name("orgao_expeditor");
	protected static By txtCpf = By.name("cpf");
	protected static By txtCurso = By.name("curso");
}


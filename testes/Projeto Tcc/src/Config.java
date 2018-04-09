import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;

import com.gargoylesoftware.htmlunit.javascript.host.Element;

public class Config {
	protected static WebDriver driver;
	
	//LOGIN
	protected static String email ="teste@gmail.com";
	protected static String senha ="teste";
	
	//CADASTRO ALUNO
	protected static String nomeAluno = "Teste teste teste";
	protected static String rgAluno = "MG-19.134.345";
	protected static String orgaoAluno = "UFG";
	protected static String cpfAluno = "123456789";
	protected static String cursoAluno = "Análise e Desenvolvimento de Sistemas";
	protected static String raAluno = "123456789101";
	protected static String telefoneAluno = "1235678";
	protected static String cepAluno = "38304-258";
	protected static String numeroAluno = "2213";
	
	//CAMPOS CADASTRO
	protected static By btnAluno =  By.id("f1");
	protected static By bntOrientador = By.id("f2");
	protected static By bntCoorientador = By.id("f3");
	protected static By btnSupervisor = By.id("f4");
	protected static By btnLimpar = By.name("limpar");
	protected static By btnEnviar = By.name("enviar");
	
	protected static By txtRg = By.name("rg");
	protected static By txtNome =  By.name("nome");
	protected static By txtOrgao = By.name("orgao_expeditor");
	protected static By txtCpf = By.name("cpf");
	protected static By txtCurso = By.name("curso");
	protected static By txtRa =  By.name("ra");
	protected static By txtTelefone = By.name("telefone");
	protected static By txtCep = By.name("cep");
	protected static By txtEstado = By.name("estado");
	protected static By txtNumero = By.name("numero");
	protected static By txtEmail = By.name("email");
	protected static By txtSenha = By.name("senha");
	//ORIENTADOR
	protected static By txtTitulacao = By.name("titulacao");
	protected static By txtInstituicao = By.name("institucao");
}


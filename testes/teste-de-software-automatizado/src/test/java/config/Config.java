package config;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;

public class Config {
	public static WebDriver driver;
	protected static String resultado="";
	protected static By btnLogin = By.name("logar");
	public static int indice=0 ;
	
	//LOGIN
	protected static By email = By.name("email");
	protected static By senha = By.name("senha");
	protected static By btnCadastro = By.id("m2");
	
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
	
	protected static By alerta = By.xpath("//*[@id='page-wrapper']/div[1]/strong");
	
	//ORIENTADOR
	protected static By txtNomeOrientador = By.xpath("//*[@id='d2']/form/div[2]/div/input");
	protected static By txtRgOrientador = By.xpath("//*[@id='d2']/form/div[3]/div/input");
	protected static By txtOrgaoOrientador =  By.xpath("//*[@id='d2']/form/div[4]/div/input");
	protected static By txtCpfOrientador = By.xpath("//*[@id='d2']/form/div[5]/div/input");
	protected static By txtTitulacaoOrientador = By.xpath("//*[@id='d2']/form/div[6]/div/input");
	protected static By txtInstituicao = By.xpath("//*[@id='d2']/form/div[7]/div/input");
	protected static By txtTelefoneOrientador = By.xpath("//*[@id='d2']/form/div[8]/div/input");
	protected static By txtCepOrientador = By.xpath("//*[@id='d2']/form/div[9]/div/input");
	protected static By txtNumeroOrientador = By.xpath("//*[@id='d2']/form/div[14]/div/input");
	protected static By txtEmailOrientador = By.xpath("//*[@id='d2']/form/div[15]/div/input");
	protected static By txtSenhaOrientador = By.xpath("//*[@id='d2']/form/div[16]/div/input");
	protected static By btnEnviarOrientador = By.xpath("//*[@id='d2']/form/div[17]/input[1]");
	

	
	//COORIENTADOR
	protected static By txtNomeCoorientador = By.xpath("//*[@id='d3']/form/div[2]/div/input");
	protected static By txtRgCoorientador = By.xpath("//*[@id='d3']/form/div[3]/div/input");
	protected static By txtOrgaoCoorientador=  By.xpath("//*[@id='d3']/form/div[4]/div/input");
	protected static By txtCpfCoorientador = By.xpath("//*[@id='d3']/form/div[5]/div/input");
	protected static By txtTitulacaoCoorientador = By.xpath("//*[@id='d3']/form/div[6]/div/input");
	protected static By txtInstituicaoCoorientador = By.xpath("//*[@id='d3']/form/div[7]/div/input");
	protected static By txtTelefoneCoorientador = By.xpath("//*[@id='d3']/form/div[8]/div/input");
	protected static By txtCepCoorientador = By.xpath("//*[@id='d3']/form/div[9]/div/input");
	protected static By txtNumeroCoorientador = By.xpath("//*[@id='d3']/form/div[14]/div/input");
	protected static By txtEmailCoorientador = By.xpath("//*[@id='d3']/form/div[15]/div/input");
	protected static By txtSenhaCoorientador = By.xpath("//*[@id='d3']/form/div[16]/div/input");
	protected static By btnEnviarCoorientador = By.xpath("//*[@id='d3']/form/div[17]/input[1]");

	//SUPERVISOR
	protected static By bntSupervisor = By.id("f4");
	protected static By txtNomeSupervisor = By.xpath("//*[@id='d4']/form/div[2]/div/input");
	protected static By txtRgSupervisor = By.xpath("//*[@id='d4']/form/div[3]/div/input");
	protected static By txtOrgaoSupervisor=  By.xpath("//*[@id='d4']/form/div[4]/div/input");
	protected static By txtCpfSupervisor = By.xpath("//*[@id='d4']/form/div[5]/div/input");
	protected static By txtTitulacaoSupervisor = By.xpath("//*[@id='d4']/form/div[6]/div/input");
	protected static By txtInstituicaoSupervisor = By.xpath("//*[@id='d4']/form/div[7]/div/input");
	protected static By txtTelefoneSupervisor = By.xpath("//*[@id='d4']/form/div[8]/div/input");
	protected static By txtCepSupervisor = By.xpath("//*[@id='d4']/form/div[9]/div/input");
	protected static By txtNumeroSupervisor = By.xpath("//*[@id='d4']/form/div[14]/div/input");
	protected static By txtEmailSupervisor = By.xpath("//*[@id='d4']/form/div[15]/div/input");
	protected static By txtSenhaSupervisor = By.xpath("//*[@id='d4']/form/div[16]/div/input");
	protected static By btnEnviarSupervisor = By.xpath("//*[@id='d4']/form/div[17]/input[1]");

}


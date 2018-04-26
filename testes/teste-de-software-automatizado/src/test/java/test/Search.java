package test;
import java.io.IOException;
import java.util.concurrent.TimeUnit;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

import com.gargoylesoftware.htmlunit.javascript.host.dom.Text;

import config.Config;

import junit.framework.Assert;
import methods.Excel;
import methods.TSA;

public class Search extends Config implements TSA{
	
	public static String local = TSA.pasteCreate();
	
	public static  void testeLogin() throws InterruptedException, IOException {
		//Teste automatizado da parte de login do software
		
		driver = new ChromeDriver();
		driver.manage().window().fullscreen();
		String link = "http://ronivonmendes.tk/iftm/admintcc/login.php";
		driver.navigate().to(link);
		
		TSA.loatToPerformSendKeys(email,Excel.pullData("Login", "email"), driver);
		TSA.loatToPerformSendKeys(senha, Excel.pullData("Login", "senha"), driver);
		TSA.loadToPerformClick(btnLogin, driver);
	}

	
	public static void CadastroAluno() throws InterruptedException{
		/*Teste automatizado da parte de cadastro de aluno do software*/
		//driver = new ChromeDriver();
		try {
			testeLogin();
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		//String link = "http://ronivonmendes.tk/iftm/admintcc/cadastrarUsuario.php";
		//driver.navigate().to(link);
		

		
		WebDriverWait wait = new WebDriverWait(driver, 20);
		
		/*wait.until(ExpectedConditions.presenceOfElementLocated(btnAluno));
		driver.findElement(btnAluno).click();
		driver.findElement(txtNome).sendKeys(nomeAluno);
		driver.findElement(txtRg).sendKeys(rgAluno);
		driver.findElement(txtOrgao).sendKeys(orgaoAluno);
		driver.findElement(txtCpf).sendKeys(cpfAluno);
		driver.findElement(txtCurso).sendKeys(cursoAluno);
		driver.findElement(txtRa).sendKeys(raAluno);
		driver.findElement(txtTelefone).sendKeys(telefoneAluno);
		driver.findElement(txtCep).sendKeys(cepAluno);
		driver.findElement(txtNumero).sendKeys(numeroAluno);
		driver.findElement(txtEmail).sendKeys(emailAluno);
		driver.findElement(txtSenha).sendKeys(senha);
		driver.findElement(btnEnviar).submit();
		wait.until(ExpectedConditions.presenceOfElementLocated(alerta));
		System.out.println(driver.findElement(alerta).getText());
	//	Assert.assertEquals("Atenção,", driver.findElement(alerta).getText());
	
		*/
		wait.until(ExpectedConditions.presenceOfElementLocated(By.className("title1")));
		resultado = driver.findElement(By.className("title1")).getText().toString();
		
	}


	public static void CadastroOrientador() throws InterruptedException, IOException {
		testeLogin();
		WebDriverWait wait = new WebDriverWait(driver, 20);		
		wait.until(ExpectedConditions.presenceOfElementLocated(bntOrientador));
		driver.findElement(bntOrientador).click();
		
		driver.findElement(txtNomeOrientador).sendKeys(nomeOrientador);
		driver.findElement(txtRgOrientador).sendKeys(rgOrienatador);
		driver.findElement(txtOrgaoOrientador).sendKeys(orgaoOrientador);
		driver.findElement(txtCpfOrientador).sendKeys(cpfOrientador);
		driver.findElement(txtTitulacaoOrientador).sendKeys(titulacao);
		driver.findElement(txtInstituicao).sendKeys(instituica);
		driver.findElement(txtTelefoneOrientador).sendKeys(telefoneAluno);
		driver.findElement(txtCepOrientador).sendKeys(cepAluno);
		driver.findElement(txtNumeroOrientador).sendKeys(numeroAluno);
		driver.findElement(txtEmailOrientador).sendKeys(emailAluno);
	//	driver.findElement(txtSenhaOrientador).sendKeys(senha);
		driver.findElement(btnEnviarOrientador).submit();
		
		wait.until(ExpectedConditions.presenceOfElementLocated(alerta));
		System.out.println(driver.findElement(alerta).getText());
		Assert.assertEquals("Atenção,", driver.findElement(alerta).getText());
		
		driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);
	
	}


	public static void Coorientador() throws InterruptedException, IOException {
		testeLogin();
		WebDriverWait wait = new WebDriverWait(driver, 20);		
		wait.until(ExpectedConditions.presenceOfElementLocated(bntOrientador));
		driver.findElement(bntCoorientador).click();
		
		driver.findElement(txtNomeCoorientador).sendKeys(nomeOrientador);
		driver.findElement(txtRgCoorientador).sendKeys(rgOrienatador);
		driver.findElement(txtOrgaoCoorientador).sendKeys(orgaoOrientador);
		driver.findElement(txtCpfCoorientador).sendKeys(cpfOrientador);
		driver.findElement(txtTitulacaoCoorientador).sendKeys(titulacao);
		driver.findElement(txtInstituicaoCoorientador).sendKeys(instituica);
		driver.findElement(txtTelefoneCoorientador).sendKeys(telefoneAluno);
		driver.findElement(txtCepCoorientador).sendKeys(cepAluno);
		driver.findElement(txtNumeroCoorientador).sendKeys(numeroAluno);
		driver.findElement(txtEmailCoorientador).sendKeys(emailAluno);
		//driver.findElement(txtSenhaCoorientador).sendKeys(senha);
		driver.findElement(btnEnviarCoorientador).submit();
		
		wait.until(ExpectedConditions.presenceOfElementLocated(alerta));
		System.out.println(driver.findElement(alerta).getText());
	//	Assert.assertEquals("Atenção,", driver.findElement(alerta).getText());
		
	//	driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);
	
		
		
	}


	public static void CadastroSupervisor() throws InterruptedException, IOException {
		testeLogin();
		WebDriverWait wait = new WebDriverWait(driver, 20);		
		wait.until(ExpectedConditions.presenceOfElementLocated(bntOrientador));
		driver.findElement(bntSupervisor).click();
		
		driver.findElement(txtNomeSupervisor).sendKeys(nomeOrientador);
		driver.findElement(txtRgSupervisor).sendKeys(rgOrienatador);
		driver.findElement(txtOrgaoSupervisor).sendKeys(orgaoOrientador);
		driver.findElement(txtCpfSupervisor).sendKeys(cpfOrientador);
		driver.findElement(txtTitulacaoSupervisor).sendKeys(titulacao);
		driver.findElement(txtInstituicaoSupervisor).sendKeys(instituica);
		driver.findElement(txtTelefoneSupervisor).sendKeys(telefoneAluno);
		driver.findElement(txtCepSupervisor).sendKeys(cepAluno);
		driver.findElement(txtNumeroSupervisor).sendKeys(numeroAluno);
		driver.findElement(txtEmailSupervisor).sendKeys(emailAluno);
	//	driver.findElement(txtSenhaSupervisor).sendKeys(senha);
		driver.findElement(btnEnviarSupervisor).submit();
		
		wait.until(ExpectedConditions.presenceOfElementLocated(alerta));
		System.out.println(driver.findElement(alerta).getText());
		Assert.assertEquals("Atenção,", driver.findElement(alerta).getText());
		
		driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);
		
	}


	public static String getResultCadastroAluno() {
		// TODO Auto-generated method stub
		return resultado;
	}


	public static String getResultCadastroCoorientador() {
		// TODO Auto-generated method stub
		return resultado;
	}


	public static String getResultCadastroSupervisor() {
		// TODO Auto-generated method stub
		return resultado;
	}


	public static String getResultCadastroOrientador() {
		// TODO Auto-generated method stub
		return resultado;
	}
	
	
}

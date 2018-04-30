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
		String link = Excel.pullData("Login", "link");
		driver.navigate().to(link);
		
		TSA.loadToPerformSendKeys(email,Excel.pullData("Login", "email"), driver);
		TSA.loadToPerformSendKeys(senha, Excel.pullData("Login", "senha"), driver);
		TSA.loadToPerformClick(btnLogin, driver);
	}

	
	public static void CadastroAluno() throws InterruptedException, IOException{
		/*Teste automatizado da parte de cadastro de aluno do software*/
		testeLogin();
		TSA.loadToPerformClick(btnCadastro, driver);
		TSA.loadToPerformClick(btnAluno, driver);
		TSA.loadToPerformSendKeys(txtNome, Excel.pullData("CadastroAluno", "nome"), driver);
		TSA.loadToPerformSendKeys(txtRg, Excel.pullData("CadastroAluno", "rg"), driver);
		TSA.loadToPerformSendKeys(txtOrgao, Excel.pullData("CadastroAluno", "orgao"), driver);
		TSA.loadToPerformSendKeys(txtCpf, Excel.pullData("CadastroAluno", "cpf"), driver);
		TSA.loadToPerformSendKeys(txtCurso,Excel.pullData("CadastroAluno", "curso"), driver);
		TSA.loadToPerformSendKeys(txtRa, Excel.pullData("CadastroAluno", "matricula"), driver);
		TSA.loadToPerformSendKeys(txtTelefone, Excel.pullData("CadastroAluno", "telefone"), driver);
		TSA.loadToPerformSendKeys(txtCep, Excel.pullData("CadastroAluno", "cep"), driver);
		TSA.loadToPerformSendKeys(txtNumero, Excel.pullData("CadastroAluno", "numero"), driver);
		TSA.loadToPerformSendKeys(txtEmail, Excel.pullData("CadastroAluno", "email"), driver);
		TSA.loadToPerformSendKeys(txtSenha, Excel.pullData("CadastroAluno", "senha"), driver);
		TSA.loadToPerformClick(btnEnviar, driver);
		System.out.println(TSA.loadToPerformText(mensagem,driver));
		resultado = TSA.loadToPerformText(mensagem,driver);
	}


	public static void CadastroOrientador() throws InterruptedException, IOException {
		testeLogin();
		TSA.loadToPerformClick(btnCadastro, driver);
		TSA.loadToPerformClick(btnOrientador, driver);
		TSA.loadToPerformSendKeys(txtNomeOrientador, Excel.pullData("CadastroOrientador", "nome"), driver);
		TSA.loadToPerformSendKeys(txtRgOrientador, Excel.pullData("CadastroOrientador", "rg"), driver);
		TSA.loadToPerformSendKeys(txtOrgaoOrientador, Excel.pullData("CadastroOrientador", "orgao"), driver);
		TSA.loadToPerformSendKeys(txtCpfOrientador, Excel.pullData("CadastroOrientador", "cpf"), driver);
		TSA.loadToPerformSendKeys(txtTitulacaoOrientador, Excel.pullData("CadastroOrientador", "titulacao"), driver);
		TSA.loadToPerformSendKeys(txtInstituicao, Excel.pullData("CadastroOrientador", "instituicao"), driver);
		TSA.loadToPerformSendKeys(txtTelefoneOrientador, Excel.pullData("CadastroOrientador", "telefone"), driver);
		TSA.loadToPerformSendKeys(txtCepOrientador, Excel.pullData("CadastroOrientador", "cep"), driver);
		TSA.loadToPerformSendKeys(txtNumeroOrientador, Excel.pullData("CadastroOrientador", "numero"), driver);
		TSA.loadToPerformSendKeys(txtEmailOrientador, Excel.pullData("CadastroOrientador", "email"), driver);
		TSA.loadToPerformSendKeys(txtSenhaOrientador, Excel.pullData("CadastroOrientador", "senha"), driver);
		TSA.loadToPerformClick(btnEnviarOrientador, driver);
		System.out.println(TSA.loadToPerformText(mensagem, driver));
		resultado = TSA.loadToPerformText(mensagem, driver);
	}


	public static void CadastroCoorientador() throws InterruptedException, IOException {
		testeLogin();
		TSA.loadToPerformClick(btnCadastro, driver);
		TSA.loadToPerformClick(btnCoorientador, driver);
		TSA.loadToPerformSendKeys(txtNomeCoorientador, Excel.pullData("CadastroCoorientador", "nome"), driver);
		TSA.loadToPerformSendKeys(txtRgCoorientador, Excel.pullData("CadastroCoorientador", "rg"), driver);
		TSA.loadToPerformSendKeys(txtOrgaoCoorientador, Excel.pullData("CadastroCoorientador", "orgao"), driver);
		TSA.loadToPerformSendKeys(txtCpfCoorientador, Excel.pullData("CadastroCoorientador", "cpf"), driver);
		TSA.loadToPerformSendKeys(txtTitulacaoCoorientador, Excel.pullData("CadastroCoorientador", "titulacao"), driver);
		TSA.loadToPerformSendKeys(txtInstituicaoCoorientador, Excel.pullData("CadastroCoorientador", "instituicao"), driver);
		TSA.loadToPerformSendKeys(txtTelefoneCoorientador, Excel.pullData("CadastroCoorientador", "telefone"), driver);
		//TSA.loadToPerformSendKeys(txtCepCoorientador, Excel.pullData("CadastrCoorientador", "cep"), driver);
		TSA.loadToPerformSendKeys(txtNumeroCoorientador, Excel.pullData("CadastroCoorientador", "numero"), driver);
		TSA.loadToPerformSendKeys(txtEmailCoorientador, Excel.pullData("CadastroCoorientador", "email"), driver);
		TSA.loadToPerformSendKeys(txtSenhaCoorientador, Excel.pullData("CadastroCoorientador", "senha"), driver);
		TSA.loadToPerformClick(btnEnviarCoorientador, driver);
		System.out.println(TSA.loadToPerformText(mensagem, driver));
		resultado = TSA.loadToPerformText(mensagem, driver);

	}


	public static void CadastroSupervisor() throws InterruptedException, IOException {
		
		
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

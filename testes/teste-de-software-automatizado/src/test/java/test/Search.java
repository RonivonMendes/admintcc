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
		
		TSA.loatToPerformSendKeys(email,Excel.pullData("Login", "email"), driver);
		TSA.loatToPerformSendKeys(senha, Excel.pullData("Login", "senha"), driver);
		TSA.loadToPerformClick(btnLogin, driver);
	}

	
	public static void CadastroAluno() throws InterruptedException, IOException{
		/*Teste automatizado da parte de cadastro de aluno do software*/
		testeLogin();
		TSA.loadToPerformClick(btnCadastro, driver);
		TSA.loadToPerformClick(btnAluno, driver);
		TSA.loatToPerformSendKeys(txtNome, Excel.pullData("CadastroAluno", "nome"), driver);
		TSA.loatToPerformSendKeys(txtRg, Excel.pullData("CadastroAluno", "rg"), driver);
		TSA.loatToPerformSendKeys(txtOrgao, Excel.pullData("CadastroAluno", "orgao"), driver);
		TSA.loatToPerformSendKeys(txtCpf, Excel.pullData("CadastroAluno", "cpf"), driver);
	}


	public static void CadastroOrientador() throws InterruptedException, IOException {
		
	}


	public static void Coorientador() throws InterruptedException, IOException {
		
		
		
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

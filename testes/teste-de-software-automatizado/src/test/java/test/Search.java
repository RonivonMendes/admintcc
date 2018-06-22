package test;
import java.awt.RenderingHints.Key;
import java.io.IOException;
import java.util.concurrent.TimeUnit;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
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
	public static void open() throws IOException {
		driver = new ChromeDriver();
		driver.manage().window().fullscreen();
		String link = Excel.pullData("Login", "link");
		driver.navigate().to(link);
	}
	public static  void testeLogin(String email1, String senha1) throws InterruptedException, IOException {
		//Teste automatizado da parte de login do software
		
		
		TSA.loadToPerformSendKeys(email,email1, driver);
		TSA.loadToPerformSendKeys(senha, senha1, driver);
		TSA.loadToPerformClick(btnLogin, driver);
	}

	
	public static void CadastroAluno() throws InterruptedException, IOException{
		/*Teste automatizado da parte de cadastro de aluno do software*/
		open();
		testeLogin(Excel.pullData("Login", "email"),Excel.pullData("Login", "senha"));
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
		open();
		testeLogin(Excel.pullData("Login", "email"),Excel.pullData("Login", "senha"));
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
		open();
		testeLogin(Excel.pullData("Login", "email"),Excel.pullData("Login", "senha"));
		
		TSA.loadToPerformClick(btnCadastro, driver);
		TSA.loadToPerformClick(btnCoorientador, driver);
		TSA.loadToPerformSendKeys(txtNomeCoorientador, Excel.pullData("CadastroCoorientador", "nome"), driver);
		TSA.loadToPerformSendKeys(txtRgCoorientador, Excel.pullData("CadastroCoorientador", "rg"), driver);
		TSA.loadToPerformSendKeys(txtOrgaoCoorientador, Excel.pullData("CadastroCoorientador", "orgao"), driver);
		TSA.loadToPerformSendKeys(txtCpfCoorientador, Excel.pullData("CadastroCoorientador", "cpf"), driver);
		TSA.loadToPerformSendKeys(txtTitulacaoCoorientador, Excel.pullData("CadastroCoorientador", "titulacao"), driver);
		TSA.loadToPerformSendKeys(txtInstituicaoCoorientador, Excel.pullData("CadastroCoorientador", "instituicao"), driver);
		TSA.loadToPerformSendKeys(txtTelefoneCoorientador, Excel.pullData("CadastroCoorientador", "telefone"), driver);
		driver.findElement(By.xpath("//*[@id=\'d3\']/form/div[9]/div/input")).sendKeys(Excel.pullData("CadastroCoorientador", "bep"));
		TSA.loadToPerformSendKeys(txtNumeroCoorientador, Excel.pullData("CadastroCoorientador", "numero"), driver);
		TSA.loadToPerformSendKeys(txtEmailCoorientador, Excel.pullData("CadastroCoorientador", "email"), driver);
		TSA.loadToPerformSendKeys(txtSenhaCoorientador, Excel.pullData("CadastroCoorientador", "senha"), driver);
		TSA.loadToPerformClick(btnEnviarCoorientador, driver);
		System.out.println(TSA.loadToPerformText(mensagem, driver));
		resultado = TSA.loadToPerformText(mensagem, driver);

	}


	public static void CadastroSupervisor() throws InterruptedException, IOException {
		open();
		testeLogin(Excel.pullData("Login", "email"),Excel.pullData("Login", "senha"));
		TSA.loadToPerformClick(btnCadastro, driver);
		TSA.loadToPerformClick(btnSupervisor, driver);
		TSA.loadToPerformSendKeys(txtNomeSupervisor, Excel.pullData("CadastroSupervisor", "nome"), driver);
		TSA.loadToPerformSendKeys(txtRgSupervisor, Excel.pullData("CadastroSupervisor", "rg"), driver);
		TSA.loadToPerformSendKeys(txtOrgaoSupervisor, Excel.pullData("CadastroSupervisor", "orgao"), driver);
		TSA.loadToPerformSendKeys(txtCpfSupervisor, Excel.pullData("CadastroSupervisor", "cpf"), driver);
		TSA.loadToPerformSendKeys(txtTitulacaoSupervisor, Excel.pullData("CadastroSupervisor", "titulacao"), driver);
		TSA.loadToPerformSendKeys(txtInstituicaoSupervisor, Excel.pullData("CadastroSupervisor", "instituicao"), driver);
		TSA.loadToPerformSendKeys(txtTelefoneSupervisor, Excel.pullData("CadastroSupervisor", "telefone"), driver);
		TSA.loadToPerformSendKeys(txtCepSupervisor, Excel.pullData("CadastroSupervisor", "cep"), driver);
		TSA.loadToPerformSendKeys(txtNumeroSupervisor, Excel.pullData("CadastroSupervisor", "numero"), driver);
		TSA.loadToPerformSendKeys(txtEmailSupervisor, Excel.pullData("CadastroSupervisor", "email"), driver);
		TSA.loadToPerformSendKeys(txtSenhaSupervisor, Excel.pullData("CadastroSupervisor", "senha"), driver);
		TSA.loadToPerformClick(btnEnviarSupervisor, driver);
		System.out.println(TSA.loadToPerformText(mensagem, driver));
		resultado = TSA.loadToPerformText(mensagem, driver);
		
	}
	public static void criaProjeto() throws IOException, InterruptedException {
		open();
		testeLogin(Excel.pullData("CT01", "emailOrientador"),Excel.pullData("CT01", "senhaOrientador"));
		TSA.loadToPerformClick(cadastrarTCC, driver);
		TSA.loadToPerformSendKeys(cadastroAluno, Excel.pullData("CT01", "nomeAluno"), driver);
		TSA.loadToPerformSendKeys(tituloProjeto, Excel.pullData("CT01", "titulo"), driver);
		TSA.loadToPerformSendKeys(grupoPesquisa, Excel.pullData("CT01", "grupo"), driver);
		TSA.loadToPerformSendKeys(coorientadorTxt,Excel.pullData("CT01", "coorientador"), driver);
		TSA.loadToPerformClick(btnEnviarTCC, driver);
		System.out.println(TSA.loadToPerformText(mensagem, driver));
		TSA.loadToPerformClick(sair, driver);
		
		
	}
	public static void aceitaProjeto() throws IOException, InterruptedException {
		testeLogin(Excel.pullData("CT01", "emailAluno"),Excel.pullData("CT01", "senhaAluno"));
		TSA.loadToPerformClick(projetoTCC, driver);
		TSA.loadToPerformSendKeys(textResumo, Excel.pullData("CT01", "resumo"), driver);
		driver.findElement(By.name("aceitar")).click();
		TSA.loadToPerformClick(aceitaTCC, driver);
		driver.findElement(By.xpath("//*[@id=\'menu\']/li[3]/a"));		
	}
	
	public static void CT01() throws InterruptedException, IOException {
		criaProjeto();
		aceitaProjeto();
		testeLogin(Excel.pullData("CT01", "emailOrientador"),Excel.pullData("CT01", "senhaOrientador"));
		TSA.loadToPerformClick(teste, driver);
	
	}
	public static void CT02() throws IOException, InterruptedException {
		open();
		testeLogin(Excel.pullData("Login", "email"),Excel.pullData("Login", "senha"));
		System.out.println(Excel.pullData("Login", "senha"));
		TSA.loadToPerformClick(lista, driver);
		TSA.loadToPerformSendKeys(pesquisa, Excel.pullData("CT02","buscaraluno"), driver);
		TSA.loadToPerformClick(btnPesquisa, driver);
		By d =  By.xpath("//*[@id='page-wrapper']/div/div/table/tbody/tr[2]/td[5]/a");
		TSA.loadToPerformClick(d, driver);
		resultado = driver.findElement(By.linkText("Aprovação Orientador")).getText().toString();
	
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


	public static String getResultCT01() {
		// TODO Auto-generated method stub
		return resultado;
	}
	public static String getResultCT02() {
		// TODO Auto-generated method stub
		return resultado;
	}
	


	
	
	
}

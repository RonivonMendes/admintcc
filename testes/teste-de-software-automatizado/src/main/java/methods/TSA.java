package methods;

import java.awt.AWTException;
import java.awt.Rectangle;
import java.awt.Robot;
import java.awt.Toolkit;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.text.SimpleDateFormat;
import java.time.Instant;
import java.util.Date;
import java.util.Random;

import javax.imageio.ImageIO;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;

import config.Config;
import test.Search;

public interface TSA {

	static void loadToPerformClick(By name, WebDriver driver) {
		/*Método para clicar em um elemento.
		 * Possui doi comandos de espera explicita, um para verificar se ele é visivel e 
		 * outrro para verificar se ele é clicavel*/
		WebDriverWait wait = new WebDriverWait(driver, 30);
		if(wait.until(ExpectedConditions.visibilityOfElementLocated(name))!=null) {
			if(wait.until(ExpectedConditions.elementToBeClickable(name)) != null){
				driver.findElement(name).click();	
				evidence();
			}
		}	
	}
	static void loadToPerformSendKeys(By element,String text ,WebDriver driver) {
		/*Método para escrever dados em um elemento.
		 * Vem com doi comandos de espera explicita para verificar se o elemento é visivel e
		 * se ele está presente 
		 * */
		WebDriverWait wait = new WebDriverWait(driver, 30);
		if(wait.until(ExpectedConditions.visibilityOfElementLocated(element))!=null) {
			if(wait.until(ExpectedConditions.presenceOfElementLocated(element))!=null) {
				driver.findElement(element).sendKeys(text);
				evidence();
			}
		}
	}
	static String loadToPerformText(By element, WebDriver driver) {
		WebDriverWait wait = new WebDriverWait(driver, 30);
		
		if(wait.until(ExpectedConditions.visibilityOfElementLocated(element))!=null) {
			if(wait.until(ExpectedConditions.presenceOfElementLocated(element))!=null) {
				return driver.findElement(element).getText().toString();
			}
		}
	return "Erro ao puxar dados";
	}
	static String pasteCreate() {
		/*Método que cria uma pasta em evidences com a data e hora do teste*/
		   try {
			   Instant data = java.time.Instant.now();
			  String dat= data.toString();
			   String in = convertData(dat);
			  String local = "evidence/"+in;
	          File diretorio = new File(local);
	          
	          diretorio.mkdir();
	          return local;
		   } catch (Exception ex) {
	            System.out.println(ex);
	 		   return "Erro";
		   }
	}

	static void evidence() {
		/*Método responsável por salvar as evidências dentro da pasta criada pelo método pasteCreate */
		try{
             Robot robot = new Robot();
             int y = Toolkit.getDefaultToolkit().getScreenSize().width;
             int x = Toolkit.getDefaultToolkit().getScreenSize().height;
             Instant data = java.time.Instant.now();
			  String dat= data.toString();
			   String in = TSA.convertData(dat);
             String instance2= Search.local+"/"+in+".jpg" ;
             BufferedImage bi = robot.createScreenCapture(new Rectangle(0, 0, y, x)); 
             ImageIO.write(bi, "jpg", new File(instance2));
         } catch(AWTException e){
             e.printStackTrace();
         } catch(IOException e){
             e.printStackTrace();
         }
	}
	
	static String convertData(String data) {
		/*Método responsável por tirar : e espaços de um date*/
		 char[] b = data.toString().toCharArray();
		 for(int i=0;i<b.length;i++) {
			 if(b[i]==':'||b[i]==' ') {
				 b[i]='-';
			 }
		 }
		 String text = String.copyValueOf(b);
		 return text;
	}
}

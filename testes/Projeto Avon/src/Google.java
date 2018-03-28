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

import junit.framework.Assert;

public class Google extends Config{
	WebDriver driver;
	@SuppressWarnings("deprecation")
	@Test	
	public  void testeLogin() throws InterruptedException {
		/*Teste automatizado da parte de login do software*/
		driver = new ChromeDriver();
		
		String link = "http://localhost/Projeto/login.php";
		driver.navigate().to(link);
		
		WebDriverWait wait = new WebDriverWait(driver, 10);
		
		
		driver.findElement(By.name("email")).sendKeys(email);
		driver.findElement(By.name("senha")).sendKeys(senha);
		driver.findElement(By.name("Sign In")).submit();
		driver.manage().timeouts().implicitlyWait(5, TimeUnit.SECONDS);
		Assert.assertEquals(driver.findElement(By.id("texto_1")).getText().toString(),"Login certo");
	
	}
	
	@Before
	public void inicia(){
		String exePath ="C:\\Drivers\\chromedriver.exe";
		System.setProperty("webdriver.chrome.driver",exePath);
	}
	@After
	public void  encerra(){
		driver.quit();
	}
}

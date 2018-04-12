import org.junit.After;
import org.junit.Before;
import org.junit.Test;

public class CadastroOrientador extends Testes {
	@SuppressWarnings("deprecation")
	@Test
	public  void main() throws InterruptedException {
		Testes.testeCadastroOrientador();
	}
	
	@Before
	public void inicia(){
		String exePath ="C:\\Driver\\chromedriver.exe";
		System.setProperty("webdriver.chrome.driver",exePath);
	}
	@After
	public void  encerra(){
		driver.quit();
	}

}

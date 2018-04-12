import org.junit.After;
import org.junit.Before;
import org.junit.Test;

public class CadastroCoorientador extends Testes {
	@SuppressWarnings("deprecation")
	@Test
	public  void main() throws InterruptedException {
		Testes.testeCoorientador();
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

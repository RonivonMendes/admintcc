package scenario.cases;

import java.io.IOException;

import org.junit.After;
import org.junit.Before;
import org.junit.Test;

import config.Config;
import test.search;

public class CadastroOrientador extends search {
	@SuppressWarnings("deprecation")
	@Test
	public  void main() throws InterruptedException, IOException {
		search.testeCadastroOrientador();
	}
	
	@Before
	public void inicia(){
		String exePath ="driver\\chromedriver.exe";
		System.setProperty("webdriver.chrome.driver",exePath);
	}

	@After
	public void  encerra(){
		Config.driver.quit();
	}

}

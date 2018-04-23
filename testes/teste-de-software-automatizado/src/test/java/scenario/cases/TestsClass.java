package scenario.cases;

import org.junit.runner.JUnitCore;

import config.Config;

public class TestsClass {
	public  void main() throws InterruptedException {
		JUnitCore.runClasses(CadastroAluno.class);
		Config.emailAluno = "emailblablabla";
		JUnitCore.runClasses(CadastroOrientador.class);
	}
}

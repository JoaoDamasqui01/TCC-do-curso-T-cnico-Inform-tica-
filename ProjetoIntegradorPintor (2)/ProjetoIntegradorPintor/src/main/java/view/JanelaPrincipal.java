package view;

import dao.*;
import model.*;
import util.JPAUtil;

import javax.persistence.EntityManager;
import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.List;

public class JanelaPrincipal implements ActionListener {
    static String resultado;
    private static model.Usuarios Usuarios;
    JMenuItem sair, marcasCad, marcasCon, marcasAlt, marcasExc,
            entregasCad, entregasCon, entregasAlt, entregasExc,
            usuarioCad, usuarioCon, usuarioAlt, usuarioExc,
            fornecedorCad, fornecedorCon, fornecedorAlt, fornecedorExc,
            tipoItenCon,
            formasPagamentoCon,
            itensCad,
            pedidosCad;

    public JanelaPrincipal() {
        JFrame janela = new JFrame("Pizzaria Tech");
        //Define tamanho da janela WIDTH:Largura HEIGHT:Altura
        janela.setSize(400, 400);  //Definindo bem fica um embaixo do outro
        janela.setLayout(new FlowLayout(1, 10, 10));
        janela.setLocationRelativeTo(null);// Centraliza na sua tela
        // >>align<< Determino a posição do botão

        //Criar uma Barra de menu
        JMenuBar JmBarra = new JMenuBar();
        janela.setJMenuBar(JmBarra);

        //Instanciar as opções do meu
        JMenu cadastrar = new JMenu("Cadastrar");
        JMenu consultar = new JMenu("Consultar");
        JMenu alterar = new JMenu("Alterar");
        JMenu excluir = new JMenu("Excluir");
        JMenu finalizar = new JMenu("Finalizar");


        JmBarra.add(cadastrar);
        JmBarra.add(consultar);
        JmBarra.add(alterar);
        JmBarra.add(excluir);
        JmBarra.add(finalizar);

        //Intancias
        sair = new JMenuItem(" Sair ");
        marcasCad = new JMenuItem("Marcas");
        marcasCon = new JMenuItem("Marcas");
        marcasAlt = new JMenuItem("Marcas");
        marcasExc = new JMenuItem("Marcas");

        //Instanciar Entregas
        entregasCad = new JMenuItem("Entregas");
        entregasCon = new JMenuItem("Entregas");
        entregasAlt = new JMenuItem("Entregas");
        entregasExc = new JMenuItem("Entregas");

        //instanciar Usuarios
        usuarioCad = new JMenuItem("Usuarios");
        usuarioCon = new JMenuItem("Usuarios");
        usuarioAlt = new JMenuItem("Usuarios");
        usuarioExc = new JMenuItem("Usuarios");

        //Instanciar Fornecedor
        fornecedorCad = new JMenuItem("Fornecedor");
        fornecedorCon = new JMenuItem("Fornecedor");
        fornecedorAlt = new JMenuItem("Fornecedor");
        fornecedorExc = new JMenuItem("Forneceddor");

        //Instanciar Tipo de Itens
        tipoItenCon = new JMenuItem("Tipo de itens");

        //Instanciar Forma de Pagamento
        formasPagamentoCon = new JMenuItem("Forma de Pagamento");

        itensCad = new JMenuItem("Entrada no estoque");

        pedidosCad = new JMenuItem("Fazer Pedido");

        //Adicionar ao menu
        finalizar.add(sair);
        //marcas
        cadastrar.add(marcasCad);
        cadastrar.add(entregasCad);
        cadastrar.add(usuarioCad);
        cadastrar.add(fornecedorCad);
        cadastrar.add(itensCad);
        cadastrar.add(pedidosCad);

        consultar.add(marcasCon);
        consultar.add(entregasCon);
        consultar.add(usuarioCon);
        consultar.add(fornecedorCon);
        consultar.add(tipoItenCon);
        consultar.add(formasPagamentoCon);

        alterar.add(marcasAlt);
        alterar.add(entregasAlt);
        alterar.add(usuarioAlt);
        alterar.add(fornecedorAlt);


        excluir.add(marcasExc);
        excluir.add(entregasExc);
        excluir.add(usuarioExc);
        excluir.add(fornecedorExc);

        finalizar.add(sair);

        //adicionar ação
        sair.addActionListener(this);

        //Categorias
        //<--MARCAS-->
        marcasCad.addActionListener(this);
        marcasCon.addActionListener(this);
        marcasAlt.addActionListener(this);
        marcasExc.addActionListener(this);

        //<--ENTREGAS-->
        entregasCad.addActionListener(this);
        entregasCon.addActionListener(this);
        entregasAlt.addActionListener(this);
        entregasExc.addActionListener(this);

        //<--USUARIO-->
        usuarioCad.addActionListener(this);
        usuarioCon.addActionListener(this);
        usuarioAlt.addActionListener(this);
        usuarioExc.addActionListener(this);

        //<--Fornecedor-->
        fornecedorCad .addActionListener(this);
        fornecedorCon .addActionListener(this);
        fornecedorAlt .addActionListener(this);
        fornecedorExc .addActionListener(this);

        //<--Tipo Itens-->
        tipoItenCon.addActionListener(this);

        //<--Forma de Pagamento-->
        formasPagamentoCon.addActionListener(this);

        //<--Itens-->
        itensCad.addActionListener(this);

        pedidosCad.addActionListener(this);

        janela.setVisible(true);
        janela.setDefaultCloseOperation(JFrame.HIDE_ON_CLOSE);

    }

    @Override
    public void actionPerformed(ActionEvent e) {
        if (e.getSource() == sair) {
            JOptionPane.showMessageDialog(null, "Processo Finalizado com sucesso!");
            System.exit(0);
        } else if (e.getSource() == marcasCad) {
            cadastarMarca();
            JOptionPane.showMessageDialog(null, "Cadastro realizado com sucesso!");
        } else if (e.getSource() == marcasCon) {
            resultado = consultarMarca();
            JOptionPane.showMessageDialog(null, resultado);
        } else if (e.getSource() == marcasAlt) {
            resultado = consultarMarca();
            int id = Integer.parseInt(JOptionPane.showInputDialog(resultado + "\nEscolha qual é o id deseja alterar"));
            alterarMarca(id);
            JOptionPane.showMessageDialog(null, "Altaração concluida");
        } else if (e.getSource() == marcasExc) {
            resultado = consultarMarca();
            int id = Integer.parseInt(JOptionPane.showInputDialog(null, resultado + "\nEscolha uma id que deseja excluir:"));
            excluirMarca(id);
            JOptionPane.showMessageDialog(null, "Exclução realizada com sucesso!");
        } else if (e.getSource() == entregasCad) {
            new JanelaEntrega();
        } else if (e.getSource() == entregasCon) {
            resultado = consultarEntrega();
            JOptionPane.showMessageDialog(null, resultado);
        } else if (e.getSource() == entregasAlt) {
            resultado = consultarEntrega();
            int id = Integer.parseInt(JOptionPane.showInputDialog(resultado + "\nEscolha qual é o id deseja alterar"));
            alterarEntrega(id);
            JOptionPane.showMessageDialog(null, "Altaração concluida");
        } else if (e.getSource() == entregasExc) {
            resultado = consultarEntrega();
            int id = Integer.parseInt(JOptionPane.showInputDialog(null, resultado + "\nEscolha uma id que deseja excluir:"));
            excluirEntrega(id);
            JOptionPane.showMessageDialog(null, "Exclução realizada com sucesso!");
        } else if (e.getSource() == usuarioCad) {
            new JanelaUsuarios();
        } else if (e.getSource() == usuarioCon) {
            resultado = consultarUsuario();
            JOptionPane.showMessageDialog(null, resultado);
        } else if (e.getSource() == usuarioAlt) {
            resultado = consultarUsuario();
            int id = Integer.parseInt(JOptionPane.showInputDialog(resultado +  "\nEscolha qual id deseja alterar"));
            alterarUsuario(id);
            JOptionPane.showMessageDialog(null,
                    "Alteração realizada com sucesso");
        } else if (e.getSource() == usuarioExc ) {
            resultado = consultarUsuario();
             int id = Integer.parseInt(JOptionPane.showInputDialog(resultado +
                    "\nEscolha qual id deseja excluir"));
            excluirUsuario(id);
            JOptionPane.showMessageDialog(null,
                    "Exclusão realizada com sucesso");

        }else if (e.getSource() == fornecedorCad) {
            new JanelaFornecedor();
        } else if (e.getSource() == fornecedorCon) {
            resultado = consultarFornecedor();
            JOptionPane.showMessageDialog(null, resultado);
        } else if (e.getSource() == fornecedorAlt) {
            resultado = consultarFornecedor();
            int id = Integer.parseInt(JOptionPane.showInputDialog(resultado +  "\nEscolha qual id deseja alterar"));
            alterarFornecedor(id);
            JOptionPane.showMessageDialog(null,
                    "Alteração realizada com sucesso");
        } else if (e.getSource() == fornecedorExc) {
            resultado = consultarFornecedor();
            int id = Integer.parseInt(JOptionPane.showInputDialog(resultado +
                    "\nEscolha qual id deseja excluir"));
            excluirFornecedor(id);
            JOptionPane.showMessageDialog(null,
                    "Exclusão realizada com sucesso");
        } else if (e.getSource() == tipoItenCon) {
            resultado = consultarTipoIten();
            JOptionPane.showMessageDialog(null, resultado);
        }else if (e.getSource() == formasPagamentoCon) {
            resultado = consultarFormaPagamento();
            JOptionPane.showMessageDialog(null, resultado);
        } else if (e.getSource() == itensCad) {
            new JanelaItens();
        } else if (e.getSource() == pedidosCad) {
            new JanelaPedidos();
        }

    }

    public static void cadastarMarca() {
        String marcasProdutos = JOptionPane.showInputDialog("Informe a Marca do Produto");
        //instansiar a classe
        Marcas marcas = new Marcas(marcasProdutos);
        //Conectar com o banco de dados
        EntityManager em = JPAUtil.getEntityManager();
        MarcasDao marcasDao = new MarcasDao(em);
        em.getTransaction().begin();
        marcasDao.cadastrar(marcas);
        em.getTransaction().commit();
        em.close();
    }

    public static String consultarMarca() {
        //Conectar com o banco de dados
        EntityManager em = JPAUtil.getEntityManager();
        MarcasDao marcasDao = new MarcasDao(em);
        List<Marcas> todos = marcasDao.buscarTodos();

        resultado = "ID - Marcas do Produtos\n";
        int numReg = todos.size();
        for (int i = 0; i < numReg; i++) {
            resultado += todos.get(i).getIdMarcas() + " - " +
                    todos.get(i).getMarcasProdutos() + "\n";
        }
        return resultado;
    }

    public static void alterarMarca(int id) {
        //Conectar com o banco de dados
        EntityManager em = JPAUtil.getEntityManager();
        MarcasDao marcasDao = new MarcasDao(em);
        //Novo nome da marca do produtos
        String marcasProdutos = JOptionPane.showInputDialog("Digite a marca: ");
        //Carrega o registro na memória
        Marcas marcas = marcasDao.buscarPorId(id);
        em.getTransaction().begin();
        String[] botoes = {"Marca"};
        int opcao = JOptionPane.showOptionDialog(null,
                "Qual o campo deseja alterar?", "TABELA MARCA",
                0, 3, null, botoes, 0);

        switch (opcao) {
            case 0:
                String marca = JOptionPane.showInputDialog("Alterar nome da marca:");
                marcas.setMarcasProdutos(marca);
                break;
        }
        marcasDao.alterar(marcas);
        marcas.setMarcasProdutos(marcasProdutos);
        em.getTransaction().commit();
        em.close();
    }

    public static void excluirMarca(int id) {
        //Conectar com o banco de dados
        EntityManager em = JPAUtil.getEntityManager();
        MarcasDao marcasDao = new MarcasDao(em);

        Marcas marcas = marcasDao.buscarPorId(id);
        em.getTransaction().begin();
        marcasDao.excluir(marcas);
        em.getTransaction().commit();
        em.close();
    }

    public static String consultarEntrega() {
        EntityManager em = JPAUtil.getEntityManager();
        EntregasDao entregasDao = new EntregasDao(em);
        List<Entregas> todos = entregasDao.buscarTodos();

        resultado = "ID - Veiculo - Placa - Modelo\n";
        int numReg = todos.size();
        for (int i = 0; i < numReg; i++) {
            resultado += todos.get(i).getIdEntregas() + " - " +
                    todos.get(i).getVeiculo() + " - " +
                    todos.get(i).getPlaca() +  " - " +
                    todos.get(i).getModelo() + "\n";
        }
        return resultado;
    }

    public static String alterarEntrega(int id) {
        //Conectar com o banco de dados
        EntityManager em = JPAUtil.getEntityManager();
        //Novo nome da marca do produtos
        EntregasDao entregasDao = new EntregasDao(em);
        //Carrega o registro na memória
        Entregas entregas = entregasDao.buscarPorId(id);
        em.getTransaction().begin();
        //EntregasDao.alterar(entregas);

        String[] botoes = {"Veiculo", "Placa", "Modelo"};
        int opcao = JOptionPane.showOptionDialog(null,
                "Qual o campo deseja alterar?", "TABELA USUÁRIO",
                0, 3, null, botoes, 0);

        switch (opcao) {
            case 0:
                String veiculo = JOptionPane.showInputDialog("Alterar nome de login");
                entregas.setVeiculo(veiculo);
                break;
            case 1:
                String placa = JOptionPane.showInputDialog("Alterar placa: ");
                entregas.setPlaca(placa);
                break;
            case 2:
                String modelo = JOptionPane.showInputDialog("Alterar modelo: ");
                entregas.setModelo(modelo);
                break;

        }
        em.getTransaction().commit();
        em.close();
        return " ";
    }

    public static void excluirEntrega(int id) {
        //Conectar com o banco de dados
        EntityManager em = JPAUtil.getEntityManager();
        EntregasDao entregasDao = new EntregasDao(em);

        Entregas entregas = EntregasDao.buscarPorId(id);
        em.getTransaction().begin();
        entregasDao.excluir(entregas);
        em.getTransaction().commit();
        em.close();
    }


    public static String consultarUsuario() {
        // conectar com o banco de dados
        EntityManager em = JPAUtil.getEntityManager();
        UsuariosDao usuariosDao = new UsuariosDao(em);
        List<Usuarios> todos = usuariosDao.buscarTodos();
        resultado = "ID - NOME - SENHA - CPF \n";
        int numReg = todos.size();
        for (int i = 0; i < numReg; i++) {
            resultado += todos.get(i).getIdUsuario() + " - " +
                    todos.get(i).getNomeCompleto() + " - " +
                    todos.get(i).getSenha() + " - " +
                    todos.get(i).getCpf() + "\n";
        }
        return resultado;
    }

    public static String alterarUsuario(int id) {
        EntityManager em = JPAUtil.getEntityManager();
        UsuariosDao usuariosDao = new UsuariosDao(em); //
        // busca por ID
        Usuarios usuarios = UsuariosDao.buscarPorId(id);
        // inicia a transação
        em.getTransaction().begin();
        // carregar na memória
        UsuariosDao.alterar(usuarios);
        // escolher o campo que deseja alterar
        String[] botoes = {"Nome", "Senha", "CPF"};
        int opcao = JOptionPane.showOptionDialog(null,
                "Qual o campo deseja alterar?", "TABELA USUÁRIO",
                0, 3, null, botoes, 0);

        switch (opcao) {
            case 0:
                String nome = JOptionPane.showInputDialog("Alterar nome de login");
                usuarios.setNomeCompleto(nome);
                break;
            case 1:
                long cpf = Long.parseLong(JOptionPane.showInputDialog("Alterar o cpf: "));
                usuarios.setCpf(cpf);
                break;
            case 2:
                long senha = Long.parseLong(JOptionPane.showInputDialog("Digite a nova senha: "));
                usuarios.setSenha(senha);
                break;
        }
        em.getTransaction().commit();
        em.close();
        return "";
    }

    public static void excluirUsuario(int id) {
        // conectar com o banco de dados
        EntityManager em = JPAUtil.getEntityManager();
        UsuariosDao usuariosDao = new UsuariosDao(em);
        // carrega o registro  na memória
        Usuarios usuarios = UsuariosDao.buscarPorId(id);
        em.getTransaction().begin();
        usuariosDao.excluir(usuarios);
        em.getTransaction().commit();
        em.close();
    }

    public static String consultarFornecedor(){
        EntityManager em = JPAUtil.getEntityManager();
        FornecedoresDao fornecedoresDao = new FornecedoresDao(em);
        List<Fornecedores> todos = FornecedoresDao.buscarTodos();

        resultado = "ID - Fornecedor - Endereço - CNPJ - TELEFONE\n";
        int numReg = todos.size();
        for (int i = 0; i < numReg; i++) {
            resultado += todos.get(i).getIdFornecedores() + " - "
                    + todos.get(i).getNomeFornecedor() + " - "
                    + todos.get(i).getEndereco() + " - "
                    + todos.get(i).getCnpj() + " - "
                    + todos.get(i).getFone() + "\n";
        }
        return resultado;
    }

    public static String alterarFornecedor(int id){
        EntityManager em = JPAUtil.getEntityManager();
        FornecedoresDao fornecedoresDao = new FornecedoresDao(em); //
        // busca por ID
        Fornecedores fornecedores = FornecedoresDao.buscarPorId(id);
        // inicia a transação
        em.getTransaction().begin();
        // carregar na memória
        FornecedoresDao.alterar(fornecedores);
        // escolher o campo que deseja alterar
        String[] botoes = {"Nome", "CNPJ","Telefone", "Endereço" };
        int opcao = JOptionPane.showOptionDialog(null,
                "Qual o campo deseja alterar?", "TABELA USUÁRIO",
                0, 3, null, botoes, 0);
        //Está alterando mais não mostrando os novos dados inseridos no JOptionPane
        //Precisa ser Verificado
        switch (opcao) {
            case 0:
                String nome = JOptionPane.showInputDialog("Alterar nome de Fornecedor: ");
                fornecedores.setNomeFornecedor(nome);
                break;
            case 1:
                long cnpj = Long.parseLong(JOptionPane.showInputDialog("Alterar o CNPJ: "));
                fornecedores.setCnpj(cnpj);
                break;
            case 2:
                long fone = Long.parseLong(JOptionPane.showInputDialog("Digite o nova telefone: "));
                fornecedores.setFone(fone);
                break;
            case 3:
                String endereco = JOptionPane.showInputDialog("Digite o novo endereço: ");
                fornecedores.setEndereco(endereco);
        }
        em.getTransaction().commit();
        em.close();
        return "";
    }

    public static void excluirFornecedor(int id) {
        // conectar com o banco de dados
        EntityManager em = JPAUtil.getEntityManager();
        FornecedoresDao fornecedoresDao = new FornecedoresDao(em);
        // carrega o registro  na memória
        Fornecedores fornecedores = FornecedoresDao.buscarPorId(id);
        em.getTransaction().begin();
        fornecedoresDao.excluir(fornecedores);
        em.getTransaction().commit();
        em.close();
    }

    public static String consultarTipoIten(){
        EntityManager em = JPAUtil.getEntityManager();
        TiposItensDao tiposItensDao = new TiposItensDao(em);
        List<TiposItens> todos = TiposItensDao.buscarTodos();

        resultado = "ID - Descrição \n";
        int numReg = todos.size();
        for (int i = 0; i < numReg; i++) {
            resultado += todos.get(i).getIdTiposItens() + " - "
                    + todos.get(i).getDescricao() + "\n";
        }
        return resultado;
    }

    public static String consultarFormaPagamento(){
        EntityManager em = JPAUtil.getEntityManager();
        FormasPagamentosDao formasPagamentosDao = new FormasPagamentosDao(em);
        List<FormasPagamentos> todos = FormasPagamentosDao.buscarTodos();

        resultado = "ID - PAGAMENTOS\n";
        int numReg = todos.size();
        for (int i = 0; i < numReg; i++) {
            resultado += todos.get(i).getIdFormasPagamentos() + " - "
                    + todos.get(i).getPagamentos() + "\n";
        }
        return resultado;
    }





}

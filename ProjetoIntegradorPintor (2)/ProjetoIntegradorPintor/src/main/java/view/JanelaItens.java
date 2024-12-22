package view;

import dao.FornecedoresDao;
import dao.ItensDao;
import dao.MarcasDao;
import dao.TiposItensDao;
import model.Fornecedores;
import model.Itens;
import model.Marcas;
import model.TiposItens;
import util.JPAUtil;

import javax.persistence.EntityManager;
import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.List;

public class JanelaItens implements ActionListener {

    JButton btCadastrar, btCancelar;
    JTextField tfNomeItem, tfQtdeEstoque, tfPrecoUnitario;
    JLabel lbNomeItem, lbQtdeEstoque, lbPrecoUnitario, lbTiposMarcas, lbTiposItens,
            lbTiposFornecedor;
    String [] tiposMarcas;
    String [] tiposItens;
    String [] tiposFornecedores;

    JComboBox cbxTiposMarcas, cbxTiposItens, cbxTiposFornecedores;

    public JanelaItens(){
        JFrame janela = new JFrame("Cadastro de Itens");
        janela.setSize(400, 300); // tamanho da tela
        janela.setLocationRelativeTo(null); // centraliza na tela
        janela.setLayout(new GridLayout(7, 1, 22,10));

        lbNomeItem = new JLabel("Nome Item:");
        tfNomeItem = new JTextField(20);

        lbQtdeEstoque = new JLabel("Quantide em Estoque:");
        tfQtdeEstoque = new JTextField(20);

        lbPrecoUnitario = new JLabel("Preco Unitário:");
        tfPrecoUnitario = new JTextField(20);

        lbTiposMarcas = new JLabel("Marca:");
        carregarTiposMarcas();
        cbxTiposMarcas = new JComboBox(tiposMarcas);

        lbTiposItens = new JLabel("Tipo Iten:");
        carregarTiposItens();
        cbxTiposItens = new JComboBox(tiposItens);

        lbTiposFornecedor = new JLabel("Fornecedor:");
        carrgarTiposFornecedore();
        cbxTiposFornecedores = new JComboBox(tiposFornecedores);


        btCadastrar = new JButton("Cadastrar");
        btCancelar = new JButton("Cancelar");

        janela.add(lbNomeItem);
        janela.add(tfNomeItem);
        janela.add(lbQtdeEstoque);
        janela.add(tfQtdeEstoque);
        janela.add(lbPrecoUnitario);
        janela.add(tfPrecoUnitario);
        janela.add(lbTiposMarcas);
        janela.add(cbxTiposMarcas);
        janela.add(lbTiposItens);
        janela.add(cbxTiposItens);
        janela.add(lbTiposFornecedor);
        janela.add(cbxTiposFornecedores);
        janela.add(btCadastrar);
        janela.add(btCancelar);

        btCadastrar.addActionListener(this);


        janela.setVisible(true);
        janela.setDefaultCloseOperation(JFrame.HIDE_ON_CLOSE); // FECHA A JANELA AO TERMINAR
    }

    public void carregarTiposMarcas() {
        EntityManager em = JPAUtil.getEntityManager();
        MarcasDao marcasDao = new MarcasDao(em);
        List<Marcas> todos = marcasDao.buscarTodos();
        int numReg = todos.size();
        tiposMarcas = new String[numReg + 1]; // criar um vetor
        tiposMarcas[0] = "-- Selecione uma opção --";
        for (int i = 0; i < numReg; i++) {
            tiposMarcas[i + 1] = todos.get(i).getMarcasProdutos();
        }
    }

    public void carregarTiposItens() {
        EntityManager em = JPAUtil.getEntityManager();
        TiposItensDao tiposItensDao = new TiposItensDao(em);
        List<TiposItens> todos = TiposItensDao.buscarTodos();
        int numReg = todos.size();
        tiposItens = new String[numReg + 1]; // criar um vetor
        tiposItens[0] = "-- Selecione uma opção --";
        for (int i = 0; i < numReg; i++) {
            tiposItens[i + 1] = todos.get(i).getDescricao();
        }
    }

    public void carrgarTiposFornecedore(){
        EntityManager em = JPAUtil.getEntityManager();
        FornecedoresDao fornecedoresDao = new FornecedoresDao(em);
        List<Fornecedores> todos = fornecedoresDao.buscarTodos();
        int numReg = todos.size();
        tiposFornecedores = new String[numReg + 1]; // criar um vetor
        tiposFornecedores[0] = "-- Selecione uma opção --";
        for (int i = 0; i < numReg; i++) {
            tiposFornecedores[i + 1] = todos.get(i).getNomeFornecedor();
        }
    }

    @Override
    public void actionPerformed(ActionEvent e) {
        if(e.getSource() == btCadastrar){
            String nomeItem = tfNomeItem.getText();
            int qtde = Integer.parseInt(tfQtdeEstoque.getText());
            double precoUni = Double.parseDouble(tfPrecoUnitario.getText());
            int idMarcas = cbxTiposMarcas.getSelectedIndex();
            int idFornecedores = cbxTiposFornecedores.getSelectedIndex();
            int idTiposItens = cbxTiposItens.getSelectedIndex();
            Itens itens = new Itens(idMarcas, idTiposItens, idFornecedores, qtde, nomeItem, precoUni);
            EntityManager em = JPAUtil.getEntityManager();
            ItensDao itensDao = new ItensDao(em);
            em.getTransaction().begin();
            itensDao.cadastrar(itens);
            em.getTransaction().commit();
            em.close();
            JOptionPane.showMessageDialog(null,
                    "Cadastro realizado com sucesso!");
        }
        tfNomeItem.setText(" ");
        tfQtdeEstoque.setText(" ");
        tfPrecoUnitario.setText(" ");
    }
}

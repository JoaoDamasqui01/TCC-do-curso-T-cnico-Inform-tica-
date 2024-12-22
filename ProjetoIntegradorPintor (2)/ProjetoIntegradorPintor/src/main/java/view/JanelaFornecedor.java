package view;

import dao.FornecedoresDao;
import model.Fornecedores;

import util.JPAUtil;

import javax.persistence.EntityManager;
import javax.swing.*;
import java.awt.*;
import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class JanelaFornecedor implements ActionListener {

    JButton btCadastrar, btCancelar;
    JLabel lbNomeFornecedor, lbEndereco, lbCNPJ, lbFone;
    TextField tfNomeFornecedor, tfEndereco, tfCNPJ, tfFone;

    public JanelaFornecedor(){
        JFrame janela = new JFrame("cadastro de Fornecedor");
        janela.setSize(330, 220);
        janela.setLocationRelativeTo((Component) null);
        janela.setLayout(new GridLayout(5, 3, 20, 10));

        JMenuBar JmBarra = new JMenuBar();
        janela.setJMenuBar(JmBarra);

        lbNomeFornecedor = new JLabel("Fornecedor:");
        lbCNPJ = new JLabel("CNPJ:");
        lbEndereco = new JLabel("Endereço:");
        lbFone = new JLabel("Telefone:");
        tfNomeFornecedor = new TextField(20);
        tfCNPJ = new TextField(20);
        tfFone = new TextField(20);
        tfEndereco = new TextField(20);
        btCadastrar = new JButton("Cadastrar");
        btCancelar = new JButton("Cancelar");

        janela.add(lbNomeFornecedor);
        janela.add(tfNomeFornecedor);
        janela.add(lbCNPJ);
        janela.add(tfCNPJ);
        janela.add(lbEndereco);
        janela.add(tfEndereco);
        janela.add(lbFone);
        janela.add(tfFone);
        janela.add(btCadastrar);
        janela.add(btCancelar);

        btCadastrar.addActionListener(this);
        btCancelar.addActionListener(this);


        janela.setVisible(true);
        janela.setDefaultCloseOperation(JFrame.HIDE_ON_CLOSE);


    }

    @Override
    public void actionPerformed(ActionEvent e) {
        if (e.getSource() == btCadastrar) {
                String nomeFornecedor = tfNomeFornecedor.getText();
                String endereco = tfEndereco.getText();
                long cnpj = Long.parseLong(tfCNPJ.getText());
                long fone = Long.parseLong(tfFone.getText());
                Fornecedores fornecedores = new Fornecedores(nomeFornecedor, endereco, cnpj, fone);
            // conectar com o banco de dados
                EntityManager em = JPAUtil.getEntityManager();
                FornecedoresDao fornecedoresDao = new FornecedoresDao(em);
                em.getTransaction().begin();
                fornecedoresDao.cadastrar(fornecedores);
                em.getTransaction().commit();
                em.close();
            JOptionPane.showMessageDialog(null, "Cadastro Realizado com sucesso");
        }
        tfCNPJ.setText(" ");
        tfFone.setText(" ");
        tfNomeFornecedor.setText(" ");
        tfEndereco.setText(" ");
    }
}
